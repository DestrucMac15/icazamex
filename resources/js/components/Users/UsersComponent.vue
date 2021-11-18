<template>
    <div class="component">
        <div class="card">
            <div class="card-header text-right">
                <button @click="OnOpenModal(null)" class="btn btn-primary">Nuevo usuario</button>
            </div>
            <div class="card-body">
                <h5 class="card-title">Usuarios</h5>
            </div>
            <div class="table-responsive">
                <vuetable ref="vuetable"
                    :api-url="api"
                    :fields="fields"
                    pagination-path="meta"
                    :css="css.table"
                    :sort-order="sortOrder"
                    :multi-sort="true"
                    :append-params="moreParams"
                    @vuetable:pagination-data="OnPaginationData"
                    @vuetable:row-clicked="OnRowClicked" >

                    <template slot="operacion" slot-scope="props">
                        <span v-if="[1, 4].includes(props.rowData.tipo_operacion_id)" class="badge bg-success">
                            {{ props.rowData.tipo_operacion }}
                        </span>
                        <span v-if="props.rowData.tipo_operacion_id == 2" class="badge bg-primary">
                            {{ props.rowData.tipo_operacion }}
                        </span>
                        <span v-if="[3,5].includes(props.rowData.tipo_operacion_id)" class="badge bg-secondary">
                            {{ props.rowData.tipo_operacion }}
                        </span>
                    </template>

                    <template slot="renta" slot-scope="props">
                        <span v-if="props.rowData.renta" class="badge bg-success">SI</span>
                        <span v-else class="badge bg-danger">NO</span>
                    </template>

                    <template slot="right-chevron">
                        <div class="template">
                            <i class="bi bi-chevron-compact-right"></i>
                        </div>
                    </template>
                </vuetable>
                <div class="vuetable-pagination px-2 py-2">
                    <vuetable-pagination-info ref="paginationInfo"
                        info-class="pagination-info"
                    ></vuetable-pagination-info>
                    <vuetable-pagination ref="pagination"
                        :css="css.pagination"
                        @vuetable-pagination:change-page="OnChangePage"
                    ></vuetable-pagination>
                </div>
            </div>

            <modal-component v-if="openModal" @close="openModal = false">
                <h3 slot="header">Usuario</h3>
                <div slot="body">
                    <form ref="form" @submit.prevent="handleSubmit">
                        <div class="form-group">
                            <label for="">Nombre completo</label>
                            <input v-model="user.name" required type="text" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <label for="">E-Mail</label>
                            <input v-model="user.email" required type="email" class="form-control">
                        </div>

                        <div class="form-group mt-4">
                            <label for="">Nivel de usuario</label>
                            <select v-model="user.role_id" class="form-control" required>
                                <option value="1">Administrador</option>
                                <option value="2" selected>Asesor</option>
                            </select>
                        </div>

                        <div v-if="user.id" class="form-group mt-4">
                            <input v-model="update_password" type="checkbox" :value="true" name="update_password" id="update_password">
                            <label for="update_password">Resetear contraseña</label>
                        </div>

                        <div v-if="!user.id || update_password">
                            <div class="form-group mt-4">
                                <label for="">Password</label>
                                <input v-model="user.password" required type="password" class="form-control">
                            </div>
                            <div class="form-group mt-4">
                                <label for="">Confirmar Password</label>
                                <input v-model="re_password" required type="password" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div slot="footer">
                    <button type="button" class="btn btn-default mr-8" @click="OnCloseModal">
                        Cancelar
                    </button>
                    <button :enabled="is_loading" @click="handleSubmit" type="button" class="btn btn-primary">
                        Aceptar
                    </button>
                </div>
            </modal-component>
        </div>
    </div>
</template>
<script>
import Vuetable from 'vuetable-2'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import Form from '../../Form'
import CssForBootstrap4 from '../../VuetableCssBootstrap4'
export default {
    props:{
        model: Object
    },
    mounted(){

    },
    components: {
        Vuetable,
        VuetablePagination,
        VuetablePaginationInfo,
    },
    computed: {
        api(){
            return `users/table/data?search=${this.keywords}`
        }
    },
    data(){
        return {
            openModal: false,
            is_loading: false,
            update_password: false,
            user: new Form(this.model),
            re_password: '',
            keywords: '',
            fields: [
                {
                    name: 'id',
                    sortField: 'id',
                    title: '#'
                },
                {
                    name: 'name',
                    sortField: 'name',
                    title: 'Nombre'
                },
                {
                    name: 'email',
                    sortField: 'email',
                    title: 'E-Mail'
                },
                {
                    name: '__slot:right-chevron',
                    title: '',
                    dataClass: 'text-right aligned',
                },
                /* { name: '__slot:actions', title: '', titleClass: 'text-right aligned', dataClass: 'text-center aligned' }*/
            ],
            css: CssForBootstrap4,
            sortOrder: [
                { field: 'id', sortField: 'id', direction: 'desc'}
            ],
            moreParams: {},
        }
    },
    methods: {
        handleSubmit() {
            if (this.$refs.form.checkValidity()) {
                if(this.user.password == this.re_password){
                    this.submit()
                }
                else{
                    alert('Las contraseñas no coinciden')
                }
            } else {
                this.$refs.form.reportValidity()
            }
        },
        submit(){
            this.is_loading = true
            if(this.user.id){
                axios.put(`users/${this.user.id}`, {
                    user: this.user,
                    update_password: this.update_password
                }).then(response => {
                    this.is_loading = false
                    this.OnCloseModal()
                }).catch(error => {
                    alert(error)
                    this.is_loading = false
                })
            }
            else{
                axios.post('users', {
                    user: this.user,
                    update_password: this.update_password
                }).then(response => {
                    this.is_loading = false
                    this.OnCloseModal()
                }).catch(error => {
                    alert(error)
                    this.is_loading = false
                })
            }
        },
        OnRowClicked(record, evt){
            this.OnOpenModal(record)
        },
        OnPaginationData(paginationData){
            this.$refs.pagination.setPaginationData(paginationData)
            this.$refs.paginationInfo.setPaginationData(paginationData)
        },
        OnChangePage (page) {
            this.$refs.vuetable.changePage(page)
        },
        OnOpenModal (item){
            if(item){
                this.user = item
            }
            else{
                this.user = new Form(this.model)
            }
            this.openModal = true
        },
        OnCloseModal (){
            this.openModal = false
        }
    }
}
</script>

<style scoped>
    tr{
        cursor: pointer;
    }
</style>

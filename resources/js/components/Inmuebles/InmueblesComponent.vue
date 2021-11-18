<template>
    <div class="component">
        <div class="card">
            <div class="card-header text-right">
                <slot name="toolbar"></slot>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <span v-if="tipo == `propiedades`">Inventario de propiedades</span>
                    <span v-if="tipo == `inversiones`">Inventario de inversiones</span>
                </h5>
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
        </div>
    </div>
</template>
<script>
import Vuetable from 'vuetable-2'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import CssForBootstrap4 from '../../VuetableCssBootstrap4'
export default {
    props:{
        tipo: {
            type: String,
            value: 'propiedades'
        }
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
            return `${this.tipo}/table/data?search=${this.keywords}&tipo=${this.tipo}`
        }
    },
    data(){
        return {
            titulo: '',
            keywords: '',
            fields: [
                {
                    name: 'id',
                    sortField: 'id',
                    title: '#'
                },
                {
                    name: 'titulo',
                    sortField: 'titulo',
                    title: 'Título'
                },
                {
                    name: 'display_created_at',
                    sortField: 'created_at',
                    title: 'Fecha de creación'
                },
                {
                    name: 'tipo_inmueble',
                    title: 'Tipo de inmueble'
                },
                {
                    name: '__slot:operacion',
                    title: 'Tipo de operación',
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
        OnRowClicked(record, evt){
            window.location.href = `${this.tipo}/${record.id}/edit`
        },
        OnPaginationData(paginationData){
            this.$refs.pagination.setPaginationData(paginationData)
            this.$refs.paginationInfo.setPaginationData(paginationData)
        },
        OnChangePage (page) {
            this.$refs.vuetable.changePage(page)
        }
    }
}
</script>

<style scoped>
    tr{
        cursor: pointer;
    }
</style>

<template>
    <div class="component row">
        <div class="col-md-10 offset-md-1">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>General</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Título</label>
                        <input v-model="form.data.titulo" type="text" class="form-control">
                        <input-error-component :validate="form.errors.titulo"/>
                    </div>

                    <div class="form-group mt-4">
                        <label for="">Etiquetas</label>
                        <textarea v-model="form.data.tags" class="form-control" rows="2"></textarea>
                        <input-error-component :validate="form.errors.tags"/>
                    </div>

                    <div class="form-group mt-4">
                        <label for="">Descripción</label>
                        <div id="editor">{{ form.data.description }}</div>
                        <input-error-component :validate="form.errors.descripcion"/>
                    </div>

                    <div class="form-group mt-4">
                        <multimedia-component :ids="form.data.imgidx" :type="`images`" :files="form.data.imagenes" v-on:input="set_images($event)"></multimedia-component>
                    </div>

                </div>
            </div>

            <div class="mt-4 mb-4 position-fixed" style="bottom: 0; right: 20px;">
                <div class="mb-4">
                    <button class="btn btn-primary btn-circle btn-xl" @click="save">
                        <i class="bi bi-check2-circle"></i>
                    </button>
                </div>
                <div class="mb-4">
                    <button class="btn btn-secondary btn-circle btn-xl mr-4" @click="reset">
                        <i class="bi bi-reply-fill"></i>
                    </button>
                </div>
                <div class="mb-4">
                    <button v-if="form.data.id" class="btn btn-danger btn-circle btn-xl mr-8" @click="confirmDeletion">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
import Form from '../../Form'
import Catalogos from '../../Catalogos'
import Swal from 'sweetalert2'
import Vuetable from 'vuetable-2'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import Quill from 'quill'

export default {
    props: {
        post: Object,
    },
    mounted(){
        let container = document.getElementById('editor');
        this.editor = new Quill(container,  {
            theme: 'snow'
        })

        this.editor.root.innerHTML = this.form.data.contenido
    },
    components: {
        Vuetable,
        VuetablePagination,
        VuetablePaginationInfo,
    },
    computed: {
        api(){
            return `posts/table/data?search=${this.keywords}`
        }
    },
    data(){
        return {
            form: new Form(this.post),
            keywords: '',
            editor: null,
        }
    },
    methods: {
        set_images(value){
            this.form.data.idx = value
        },
        onSuccess(result, action){
            console.log(result)
            if(result.status == 422){
                Swal.fire({
                    title: 'Error',
                    text: `Algo salió mal, revisa los datos del formulario.`,
                    icon: 'error'
                }).then(result => {

                })
                return false
            }

            let title = this.form.data.titulo
            let id = result.data.data.id
            Swal.fire({
                title: 'Correcto',
                text: `${title} ha sido ${action} correctamente.`,
                icon: 'success'
            }).then(result => {
                window.location.href = `blog/${id}/edit`
            })
        },
        save(){
            this.form.data.contenido = this.editor.root.innerHTML
            if(this.form.data.id){//update
                this.form.put(`blog/${this.form.data.id}`).then(result => {
                    this.onSuccess(result, 'actualizado')
                })
            }
            else{
                this.form.post(`blog`).then(result => {
                    this.onSuccess(result, 'creado')
                })
            }
        },
        reset(){
            window.location.href = `blog`
        },
        confirmDeletion(){
            Swal.fire({
                title: "Confirmar",
                text: `¿Desea eliminar ${this.form.data.titulo}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    let deleted = this.form.data.titulo
                    this.form.delete(`blog/${this.form.data.id}`).then(response => {
                        Swal.fire({
                            title: 'Eliminado!',
                            text: `${deleted} ha sido eliminado.`,
                            icon: 'success'
                        }).then(result => {
                            this.reset()
                        })
                    })
                } else if (result.dismiss === Swal.DismissReason.cancel) {/* Read more about handling dismissals below */

                }
            })
        }
    }
}
</script>

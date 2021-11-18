<template>
<div>
    <div class="progress" v-if="uploading">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div>
    <div v-if="!uploading">
        <button v-if="['videos', 'files'].includes(type)" class="btn btn-primary" type="button" @click="selectImage">+</button>

        <label>
            <span v-if="type == `images`">Im&aacute;genes</span>
            <span v-if="type == `files`">Archivos</span>
            <span v-if="['images', 'files'].includes(type)">(puede seleccionar m&aacute;s de una al mismo tiempo)</span>
            <span v-if="type == `videos`">Videos</span>
        </label>
        <input v-if="type == `images`" @change="addImage" type="file" accept="image/jpeg, image/png" ref="files" id="images" name="files[]" multiple class="form-control" style="display: none;">
        <input v-if="type == `files`" @change="addImage" type="file" accept="application/pdf" ref="files" id="files" name="files[]" multiple class="form-control" style="display: none;">

        <div v-for="(error, index) in errors" :key="index" class="alert alert-danger mb-2">
            {{ error }}
        </div>


        <div v-if="type == `images`" class="images-container">
            <div v-for="(image, index) in images" :key="index" class="image-container">
                <div class="controls">
                    <!--
                    <a href="" class="control-btn move">
                        <i class="fa fa-arrows"></i>
                    </a>

                    <a href="" class="control-btn star">
                        <i class="fa"></i>
                    </a>
                    -->
                    <a href="#" class="control-btn remove" @click="deleteImage($event, image)">
                        <i class="bi bi-trash"></i>
                    </a>
                </div>
                <div class="image" :style="{backgroundImage: `url(${image.url})`}">&nbsp;</div>
            </div>


            <a href="#" class="add-image" @click="selectImage">
                <div class="image-container new">
                    <div class="image">+</div>
                </div>
            </a>
        </div>

        <div v-if="['videos', 'files'].includes(type)" class="files-container">
            <ul class="list-group">
                <li v-for="(file, index) in images" :key="index" class="list-group-item d-flex justify-content-between align-items-center">
                    <a :href="file.url" target="_blank" class="btn btn-link">{{ file.titulo }}</a>
                    <span @click="deleteImage($event, file)" class="badge bg-danger rounded-pill">
                        <i class="bi bi-trash"></i>
                    </span>
                </li>
            </ul>
        </div>

        <modal-component v-if="openModal" @close="openModal = false">
            <h3 slot="header">Agregar video</h3>
            <div slot="body">
                <form ref="form" @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <label for="">Título</label>
                        <input v-model="video.titulo" required type="text" class="form-control">
                    </div>
                    <div class="form-group mt-4">
                        <label for="">URL</label>
                        <input v-model="video.url" required type="text" class="form-control" @input="preview">
                    </div>
                    <div v-if="video_preview" class="form-group mt-4">
                        <label for="">Vista previa</label>
                        <iframe :src="video_preview" frameborder="0"></iframe>
                    </div>
                </form>
            </div>
            <div slot="footer">
                <button type="button" class="btn btn-default mr-8" @click="openModal = false">
                    Cancelar
                </button>
                <button @click="handleSignup" type="button" class="btn btn-primary">
                    Aceptar
                </button>
            </div>
        </modal-component>
    </div>
</div>
</template>

<script>
    import axios from 'axios'
import ModalComponent from './ModalComponent.vue';
    export default {
  components: { ModalComponent },
        props: {
            ids: Array,
            files: Array,
            type: {
                type: String,
                default: 'images'
            }
        },
        data: function (){
            return {
                MAX_FILE_SIZE: 10,// size in MB
                images: [],
                errors: [],
                uploading: false,
                idx: [],
                openModal: false,
                video: {
                    titulo: '',
                    url: ''
                },
                video_preview: null
            };
        },
        mounted() {
            this.idx = this.ids
            this.images = this.files
        },
        methods:{
            handleSubmit(e) {
                axios({
                    method: 'POST',
                    url: `imagenes`,
                    data: {
                        type: this.type,
                        video: this.video
                    }
                }).then(result => {
                    this.images = this.images.concat(result.data.images)
                    this.idx = this.idx.concat(result.data.idx)
                    this.uploading = false
                    this.$emit('input', this.idx)

                    this.video = {
                        titulo: '',
                        url: ''
                    }
                    this.video_preview = null
                }).catch(error => {
                    this.uploading = false
                })
            },
            handleSignup() {
                if (this.$refs.form.checkValidity()) {
                    this.handleSubmit()
                } else {
                    this.$refs.form.reportValidity()
                }
            },
            getParameterByName(name, url) {
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            },
            replace(value){
                let url = ''
                if(value.indexOf('youtube') != -1){
                    let v = this.getParameterByName('v', value);
                    url = `https://www.youtube.com/embed/${v}`
                }

                if(value.indexOf('vimeo') != -1){
                    var pathNameRegex = /http[s]*:\/\/[^\/]+(\/.+)/;
                    var matches = value.match(pathNameRegex);
                    url = `https://player.vimeo.com/video${matches[1]}`
                }
                return url
            },
            preview(event){
                this.video_preview = this.replace(event.target.value)

            },
            selectImage(e){
                e.preventDefault()
                if(['images', 'files'].includes(this.type)){
                    this.$refs.files.click()
                }
                else{
                    this.openModal = true
                }
            },
            deleteImage(e, image){
                e.preventDefault()
                let msg = '¿Deseas eliminar esta imagen?'
                if(this.type == 'files'){
                    msg = 'Deseas eliminar este archivo?'
                }

                if(this.type == 'videos'){
                    msg = '¿Deseas eliminar este video?'
                }

                if(confirm(msg)){
                    axios.delete(`imagenes/${image.id}`).then(result => {
                        let index = this.idx.indexOf(image.id)
                        if(index != -1 ){
                            this.idx.splice(index, 1)
                        }

                        index = this.images.indexOf(image)
                        if(index != -1 ){
                            this.images.splice(index, 1)
                        }
                    }).catch(error => {
                        this.uploading = false
                    })
                }
            },
            addImage(){
                this.uploading = true
                this.errors = [];
                let files = this.$refs.files.files
                const formData = new FormData();
                formData.append('type', this.type)
                for(let i = 0; i < files.length; i++){
                    let file = files[i];
                    let validate = this.bytesToSize(file.size)

                    if(validate.index <= 1){// <= KB
                        formData.append('files[]', file)
                    }
                    else if(validate.size <= this.MAX_FILE_SIZE && validate.index <= 2){//MB, validate size
                        formData.append('files[]', file)
                    }
                    else{
                        this.errors.push(`${file.name} no se puede guardar porque pesa mas de ${this.MAX_FILE_SIZE} MB`)
                    }
                }

                axios.post(`imagenes`, formData, {
                        headers: {'Content-Type': 'multipart/form-data'}
                    })
                .then(result => {
                    this.images = this.images.concat(result.data.images)
                    this.idx = this.idx.concat(result.data.idx)
                    this.uploading = false
                    this.$emit('input', this.idx)

                    if(this.$refs.files){
                        this.$refs.files.files = null
                        this.$refs.files.value = null
                    }

                }).catch(error => {
                    this.uploading = false
                    if(error){
                        this.errors = error.response.data.errors
                    }
                })

            },
            bytesToSize(bytes) {
                let sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB']
                if (bytes == 0) return 0
                let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)))

                return {
                    index: i,
                    size: Math.round(bytes / Math.pow(1024, i), 2),
                    type: sizes[i]
                }
            }
        }
    }
</script>

<style scoped>
    iframe{
        width: 100%;
        height: 320px;
    }
</style>

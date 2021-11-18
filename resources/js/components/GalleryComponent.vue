<template>
<div>
    <div class="progress" v-if="uploading">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div>
    <div v-if="!uploading">
        <label>Im&aacute;genes (puede seleccionar m&aacute;s de una al mismo tiempo)</label>
        <input @change="addImage" type="file" accept="image/jpeg, image/png" ref="photos" id="photos" name="photos[]" multiple class="form-control" style="display: none;">
        <ul class="text-danger" id="photo-error">
            <li v-for="(error, index) in errors" :key="index">
                {{ error }}
            </li>
        </ul>

        <div class="images-container">
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
    </div>
</div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: {
            ids: Array,
            photos: Array
        },
        data: function (){
            return {
                MAX_FILE_SIZE: 1,// size in MB
                images: [],
                errors: [],
                uploading: false,
                idx: []
            };
        },
        mounted() {
            this.idx = this.ids
            this.images = this.photos
        },
        methods:{
            selectImage(e){
                e.preventDefault()
                this.$refs.photos.click()
            },
            deleteImage(e, image){
                e.preventDefault()
                if(confirm('Deseas eliminar esta imagen?')){
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
                let files = this.$refs.photos.files
                const formData = new FormData();
                for(let i = 0; i < files.length; i++){
                    let file = files[i];
                    let validate = this.bytesToSize(file.size)

                    if(validate.index < 3){// <= KB
                        formData.append('photos[]', file)
                    }
                    else if(validate.size <= this.MAX_FILE_SIZE && validate.index == 3){//MB, validate size
                        formData.append('photos[]', file)
                    }
                    else{
                        this.errors.push(`${file.name} no se puede guardar porque pesa mas de ${this.MAX_FILE_SIZE} MB`)
                    }
                }

                axios({
                    method: 'POST',
                    url: `imagenes`,
                    data: formData,
                    config: {
                        headers: {'Content-Type': 'multipart/form-data'}
                    }
                }).then(result => {
                    this.images = this.images.concat(result.data.images)
                    this.idx = this.idx.concat(result.data.idx)
                    this.uploading = false
                    this.$emit('input', this.idx)

                    this.$refs.photos.files = null
                    this.$refs.photos.value = null
                }).catch(error => {
                    this.uploading = false
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


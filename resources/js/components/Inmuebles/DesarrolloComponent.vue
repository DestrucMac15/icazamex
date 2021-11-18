<template>
    <div class="component row">
        <div class="col-md-10 offset-md-1">
            <form v-on:submit.prevent="onSubmit">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>General</h4>
                    </div>
                    <div class="card-body">
                        <div v-if="form.data.id" class="form-group mb-4">
                            <label for="">ID</label>
                            <input v-model="form.data.id" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">* Título</label>
                            <input v-model="form.data.titulo" type="text" class="form-control" required>
                            <input-error-component :validate="form.errors.titulo"/>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">* Descripción</label>
                            <textarea v-model="form.data.descripcion" class="form-control" rows="5"  required></textarea>
                            <input-error-component :validate="form.errors.descripcion"/>
                        </div>

                        <div class="form-group mt-4">
                            <label for="tipo_operacion">* Tipo de operación</label>
                            <select v-model="form.data.tipo_operacion_id" name="tipo_operacion" id="tipo_operacion" class="form-control" required>
                                <option v-for="item in catalogos.tipo_operacion" :key="item.id" :value="item.id">{{ item.titulo }}</option>
                            </select>
                            <input-error-component :validate="form.errors.tipo_operacion_id"/>
                        </div>

                        <div class="form-group mt-4">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="venta">Moneda</label>
                                            <select v-model="form.data.moneda_venta" class="form-control mr-4">
                                                <option value="MN">MN</option>
                                                <option value="USD">USD</option>
                                            </select>
                                        </td>
                                        <td>
                                            <label for="venta">* Precio desde</label>
                                            <input v-model="form.data.precio_desde" type="number"  min="0" step="any" class="form-control" required>
                                        </td>
                                        <td>
                                            <label for="venta">* Precio Hasta</label>
                                            <input v-model="form.data.precio_hasta" type="number"  min="0" step="any" class="form-control" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input-error-component :validate="form.errors.precio_venta"/>
                        </div>
                        <div class="form-group mt-4">
                            <label for="venta">Precio por m&sup2;</label>
                            <input v-model="form.data.precio_x_m2" type="number"  min="0" step="any" class="form-control">
                        </div>

                        <div v-if="form.data.tipo_operacion_id != 4" class="form-group mt-4 mb-4">
                            <label for="">Fecha de entrega</label>
                            <div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Mes</td>
                                            <td>Año</td>
                                        </tr>
                                        <tr>
                                            <td><input ref="mes" v-model="form.data.antiguedad_mes" @keypress="validateNumber" type="text" class="form-control" maxlength="2"></td>
                                            <td><input ref="anio" v-model="form.data.antiguedad_anio" @keypress="validateNumber" type="text" class="form-control" maxlength="4"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <input-error-component :validate="form.errors.antiguedad_fecha"/>
                        </div>

                    </div>
                </div>

                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>Multimedia</h4>
                    </div>
                    <div class="mt-2">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="imagenes-tab" data-toggle="tab" href="#images" role="tab" aria-controls="home" aria-selected="true">Cargar Imágenes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="archivos-tab" data-toggle="tab" href="#files" role="tab" aria-controls="profile" aria-selected="false">Cargar Brochure</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="contact" aria-selected="false">Cargar Tour en Video</a>
                                </li>
                            </ul>
                            <div class="tab-content p-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="images" role="tabpanel" aria-labelledby="imagenes-tab">
                                    <multimedia-component :ids="form.data.imgidx" :type="`images`" :files="form.data.imagenes" v-on:input="set_images($event)"></multimedia-component>
                                </div>
                                <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="archivos-tab">
                                    <multimedia-component :ids="form.data.fileidx" :type="`files`" :files="form.data.files" v-on:input="set_files($event)"></multimedia-component>
                                </div>
                                <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                                    <multimedia-component :ids="form.data.videoidx" :type="`videos`" :files="form.data.videos" v-on:input="set_videos($event)"></multimedia-component>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>Ubicación</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-4">
                            <label for="">* País</label>
                            <select v-model="form.data.country_id" class="form-control mr-4" required>
                                <option v-for="item in catalogos.paises" :key="item.id" :value="item.id">{{ item.name }}</option>
                            </select>
                            <input-error-component :validate="form.errors.country_id"/>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">* Estado</label>
                            <select v-model="form.data.estado_id" v-on:change="getMunicipios" class="form-control mr-4" required>
                                <option v-for="item in catalogos.estados" :key="item.id" :value="item.id">{{ item.nombre }}</option>
                            </select>
                            <input-error-component :validate="form.errors.estado_id"/>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">* Municipio / Delegación</label>
                            <select v-model="form.data.municipio_id" v-on:change="getLocalidades" class="form-control mr-4" required>
                                <option v-for="item in catalogos.municipios" :key="item.id" :value="item.id">{{ item.nombre }}</option>
                            </select>
                            <input-error-component :validate="form.errors.municipio_id"/>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">* Localidad / Colonia</label>
                            <select v-model="form.data.localidad_id" class="form-control mr-4" required>
                                <option v-for="item in catalogos.localidades" :key="item.id" :value="item.id">{{ item.nombre }}</option>
                            </select>
                            <input-error-component :validate="form.errors.localidad_id"/>
                        </div>

                        <div class="form-group mt-4">
                            <label for="">* Calle</label>
                            <input v-model="form.data.calle" type="text" class="form-control" required>
                            <input-error-component :validate="form.errors.calle"/>
                        </div>

                        <div class="form-group mt-4">
                            <label for="">Exterior</label>
                            <input v-model="form.data.exterior" type="text" class="form-control">
                            <input-error-component :validate="form.errors.exterior"/>
                        </div>

                        <div class="form-group mt-4">
                            <label for="">Interior</label>
                            <input v-model="form.data.interior" type="text" class="form-control">
                            <input-error-component :validate="form.errors.interior"/>
                        </div>

                        <div class="form-group mt-4">
                            <label for="">Código postal</label>
                            <input v-model="form.data.codigo_postal" type="text" class="form-control">
                            <input-error-component :validate="form.errors.codigo_postal"/>
                        </div>

                        <div class="form-group mt-4">
                            <label for="">Esquina con</label>
                            <input v-model="form.data.esquina_con" maxlength="250" type="text" class="form-control">
                            <input-error-component :validate="form.errors.esquina_con"/>
                        </div>

                        <div class="form-group mt-4">
                            <input v-model="form.data.ocultar_direccion" type="checkbox" name="ocultar_direccion" id="ocultar_direccion">
                            <label for="ocultar_direccion">Ocultar dirección</label>
                        </div>
                    </div>
                </div>

                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>Descripción</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-4">
                            <label for="">Roof Garden</label>
                            <select v-model="form.data.roof_garden" class="form-control">
                                <option value="privado">Privado</option>
                                <option value="comun">Común</option>
                            </select>
                            <input-error-component :validate="form.errors.roof_garden"/>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Recámaras</label>
                            <input v-model="form.data.recamaras" type="number"  min="0" step="any" class="form-control">
                            <input-error-component :validate="form.errors.recamaras"/>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Baños</label>
                            <input v-model="form.data.banios" type="number"  min="0" step="any" class="form-control">
                            <input-error-component :validate="form.errors.banios"/>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Medios Baños</label>
                            <input v-model="form.data.medio_banio" type="number"  min="0" step="any" class="form-control">
                            <input-error-component :validate="form.errors.medio_banio"/>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Estacionamientos</label>
                            <input v-model="form.data.estacionamiento" type="number"  min="0" step="any" class="form-control">
                            <input-error-component :validate="form.errors.estacionamiento"/>
                        </div>

                        <div class="form-group mt-4">
                            <label for="">No. De Departamentos</label>
                            <input v-model="form.data.numero_departamentos" type="number"  min="0" step="1" required class="form-control">
                            <input-error-component :validate="form.errors.numero_departamentos"/>
                        </div>

                        <div class="form-group mt-4">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <small>Metraje desde</small>
                                            <input v-model="form.data.metraje_desde" type="number"  min="0" step="any" class="form-control">
                                            <input-error-component :validate="form.errors.superficie_terreno"/>
                                        </td>
                                        <td>
                                            <small>Metraje hasta</small>
                                            <input v-model="form.data.metraje_hasta" type="number"  min="0" step="any" class="form-control">
                                            <input-error-component :validate="form.errors.superficie_jardin"/>
                                        </td>
                                        <td>
                                            <small>Metros totales</small>
                                            <input v-model="form.data.superficie_terreno" type="number"  min="0" step="any" class="form-control">
                                            <input-error-component :validate="form.errors.superficie_terreno"/>
                                        </td>
                                        <td>
                                            <small>Superficie</small>
                                            <select v-model="form.data.superficie" class="form-control mr-4">
                                                <option value="M2">M&sup2;</option>
                                                <option value="HE">Hectáreas</option>
                                            </select>
                                        </td>
                                        <td>
                                            <small>Construidos</small>
                                            <input v-model="form.data.superficie_construida" type="number"  min="0" step="any" class="form-control">
                                            <input-error-component :validate="form.errors.superficie_construida"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="form-group mt-4">
                            <label for="">Elevadores</label>
                            <input v-model="form.data.elevadores" type="number"  min="0" step="any" class="form-control">
                            <input-error-component :validate="form.errors.elevadores"/>
                        </div>

                        <div class="form-group mt-1">
                            <label for="">Número de departamentos</label>
                            <input v-model="form.data.numero_departamentos" type="number"  min="0" step="any" class="form-control">
                            <input-error-component :validate="form.errors.numero_departamentos"/>
                        </div>
                    </div>
                </div>

                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>Características</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-4">
                            <h5>Servicios</h5>
                            <div v-for="item in catalogos.servicios" :key="item.id">
                                <div v-if="caracteristicas.servicios.includes(item.id)" class="mt-1">
                                    <input v-model="form.data.servicios" :value="item.id" type="checkbox" :name="`servicios-${item.id}`" :id="`servicios-${item.id}`">
                                    <label :for="`servicios-${item.id}`">{{ item.titulo }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <h5>Generales</h5>
                            <div v-for="item in catalogos.generales" :key="item.id">
                                <div v-if="caracteristicas.generales.includes(item.id)" class="mt-1">
                                    <input v-model="form.data.generales" :value="item.id" type="checkbox" :name="`generales-${item.id}`" :id="`generales-${item.id}`">
                                    <label :for="`generales-${item.id}`">{{ item.titulo }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <h5>Exteriores</h5>
                            <div v-for="item in catalogos.exteriores" :key="item.id">
                                <div v-if="caracteristicas.exteriores.includes(item.id)" class="mt-1">
                                    <input v-model="form.data.exteriores" :value="item.id" type="checkbox" :name="`exteriores-${item.id}`" :id="`exteriores-${item.id}`">
                                    <label :for="`exteriores-${item.id}`">{{ item.titulo }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <h5>Amenidades</h5>
                            <div v-for="item in catalogos.amenidades" :key="item.id">
                                <div v-if="caracteristicas.amenidades.includes(item.id)" class="mt-1">
                                    <input v-model="form.data.amenidades" :value="item.id" type="checkbox" :name="`amenidades-${item.id}`" :id="`amenidades-${item.id}`">
                                    <label :for="`amenidades-${item.id}`">{{ item.titulo }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <h5>Restricciones</h5>
                            <div v-for="item in catalogos.restricciones" :key="item.id">
                                <div v-if="caracteristicas.restricciones.includes(item.id)" class="mt-1">
                                    <input v-model="form.data.restricciones" :value="item.id" type="checkbox" :name="`restricciones-${item.id}`" :id="`restricciones-${item.id}`">
                                    <label :for="`restricciones-${item.id}`">{{ item.titulo }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>Asesor</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Asesor</label>
                            <select v-model="form.data.asesor_id" name="asesor" id="asesor" class="form-control" required>
                                <option v-for="(item, index) in catalogos.asesores" :key="index" :value="item.id">{{ item.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mb-4 position-fixed" style="bottom: 0; right: 20px;">
                    <div class="mb-4">
                        <button class="btn btn-primary btn-circle btn-xl" type="submit">
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
            </form>
        </div>

        <div class="m-4">&nbsp;</div>
    </div>
</template>
<script>
import Form from '../../Form'
import Catalogos from '../../Catalogos'
import Swal from 'sweetalert2'
import Vuetable from 'vuetable-2'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import CssForBootstrap4 from '../../VuetableCssBootstrap4'

export default {
    props: {
        inmueble: Object,
        inversion: Object,
        caracteristicas: Object,
        tipo: {
            type: String,
            default: ''
        }
    },
    mounted(){
        if(!this.form.data.id){
            this.form.data.inmueble = this.tipo
        }
        this.getCatalogos()
    },
    components: {
        Vuetable,
        VuetablePagination,
        VuetablePaginationInfo
    },
    computed: {
        api(){
            return `inversiones-item/table/data?search=${this.keywords}`
        }
    },
    data(){
        return {
            form: new Form(this.inmueble),
            catalogos: new Catalogos(),
            showModal: false,

        }
    },
    methods: {
        validateNumber(evt, code) {
            evt = (evt) ? evt : window.event
            let charCode = (evt.which) ? evt.which : evt.keyCode
            let validation = null
            if(code){
                validation = (charCode > 31 && (charCode < 48 || charCode > 57)) && !code.includes(charCode)
            }
            else{
                validation = (charCode > 31 && (charCode < 48 || charCode > 57))
            }

            if (validation) {
                evt.preventDefault()
            } else {
                return true
            }
        },
        onSubmit(){
            /*
            if(this.form.data.antiguedad_mes.length < 2){
                alert('Ingrese el mes de contrucción. Ejemplo: 02')
                this.$refs.mes.focus();
                return false
            }

            if(this.form.data.antiguedad_anio.length < 4){
                alert('Ingrese el año de contrucción. Ejemplo: 1992')
                this.$refs.anio.focus();
                return false
            }
            */
            this.save()
        },
        openModal(item){
            item.inmueble_id = this.form.data.id
            this.$refs.inversion.set(item)
            this.showModal = true
        },
        set_images(value){
            this.form.data.imgidx = value
        },
        set_files(value){
            this.form.data.fileidx = value
        },
        set_videos(value){
            this.form.data.videoidx = value
            this.showModal = false
        },
        getCatalogos(){
            this.form.get('ajax/catalogos/todos?type=desarrollos', {}).then(result => {
                this.catalogos.tipo_operacion = result.data.tipo_operacion
                this.catalogos.paises = result.data.paises
                this.catalogos.estados = result.data.estados

                this.catalogos.servicios = result.data.servicios
                this.catalogos.generales = result.data.generales
                this.catalogos.exteriores = result.data.exteriores
                this.catalogos.amenidades = result.data.amenidades
                this.catalogos.restricciones = result.data.restricciones
                this.catalogos.asesores = result.data.asesores


                this.getMunicipios()
                this.getLocalidades()
            })
        },
        getMunicipios(){
            this.form.get('ajax/catalogos/municipios', {estado_id: this.form.data.estado_id}).then(result => {
                this.catalogos.municipios = result.data
                this.catalogos.localidades = []
            })
        },
        getLocalidades(){
            this.form.get('ajax/catalogos/localidades', {municipio_id: this.form.data.municipio_id}).then(result => {
                this.catalogos.localidades = result.data
            })
        },
        onSuccess(result, action){
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
                window.location.href = `${this.tipo}/${id}/edit`
            })
        },
        save(){
            if(this.form.data.id){//update
                this.form.put(`${this.tipo}/${this.form.data.id}`).then(result => {
                    this.onSuccess(result, 'actualizado')
                })
            }
            else{
                this.form.post(this.tipo).then(result => {
                    this.onSuccess(result, 'creado')
                })
            }
        },
        reset(){
            window.location.href = this.tipo
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
                    this.form.delete(`${this.tipo}/${this.form.data.id}`).then(response => {
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
        },
        OnRowClicked(record, evt){
            this.openModal(record)
        },
        OnPaginationData(paginationData){
            this.$refs.pagination.setPaginationData(paginationData)
            this.$refs.paginationInfo.setPaginationData(paginationData)
        },
        OnChangePage (page) {
            this.$refs.vuetable.changePage(page)
        },
        refresh(){
            this.showModal = false
            this.$refs.vuetable.refresh()
        }
    }
}
</script>

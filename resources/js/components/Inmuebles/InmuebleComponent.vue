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

                    <div v-if="tipo == 'propiedades'" class="form-group mt-4">
                        <input v-model="form.data.oferta" type="checkbox" name="oferta" id="oferta">
                        <label for="oferta">Publicar propiedad como promoción</label>
                    </div>

                    <div class="form-group mt-4">
                        <label for="tipo_operacion">* Tipo de operación</label>
                        <select v-model="form.data.tipo_operacion_id" name="tipo_operacion" id="tipo_operacion" class="form-control" required>
                            <option v-for="item in catalogos.tipo_operacion" :key="item.id" :value="item.id">{{ item.titulo }}</option>
                        </select>
                        <input-error-component :validate="form.errors.tipo_operacion_id"/>
                    </div>

                    <div v-if="['propiedades', 'inversiones'].includes(tipo)" class="form-group mt-4">
                        <label for="tipo_inmueble">* Tipo de inmueble</label>
                        <select v-model="form.data.tipo_inmueble_id" name="tipo_inmueble" id="tipo_inmueble" class="form-control" required>
                            <option v-for="item in catalogos.tipo_inmueble" :key="item.id" :value="item.id">{{ item.titulo }}</option>
                        </select>
                        <input-error-component :validate="form.errors.tipo_inmueble_id"/>
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
                                <a class="nav-link active" id="imagenes-tab" data-toggle="tab" href="#images" role="tab" aria-controls="home" aria-selected="true">Imágenes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="archivos-tab" data-toggle="tab" href="#files" role="tab" aria-controls="profile" aria-selected="false">Archivos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="contact" aria-selected="false">Videos</a>
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
                    <h4>Precio</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mt-4">
                        <label for="venta">* Precio</label>
                        <table class="w-100">
                            <tbody>
                                <tr>
                                    <td>
                                        <select v-model="form.data.moneda_venta" class="form-control mr-4">
                                            <option value="MN">MN</option>
                                            <option value="USD">USD</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input v-model="form.data.precio_venta" type="number"  min="0" step="any" class="form-control" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input-error-component :validate="form.errors.precio_venta"/>
                    </div>

                    <div v-if="!caracteristicas.esconder_mantenimiento.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="venta">Mantenimiento</label>
                        <input v-model="form.data.mantenimiento_venta" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.mantenimiento_venta"/>
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
                    <div v-if="!caracteristicas.esconder_recamaras.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Recámaras</label>
                        <input v-model="form.data.recamaras" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.recamaras"/>
                    </div>
                    <div v-if="!caracteristicas.esconder_banios.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Baños</label>
                        <input v-model="form.data.banios" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.banios"/>
                    </div>
                    <div v-if="!caracteristicas.esconder_medios_banios.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Medios Baños</label>
                        <input v-model="form.data.medio_banio" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.medio_banio"/>
                    </div>
                    <div v-if="!caracteristicas.esconder_estacionamientos.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Estacionamientos</label>
                        <input v-model="form.data.estacionamiento" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.estacionamiento"/>
                    </div>
                    <div v-if="!caracteristicas.esconder_piso.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Piso en el que se encuentra</label>
                        <input v-model="form.data.piso_actual" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.piso_actual"/>
                    </div>
                    <div v-if="!caracteristicas.esconder_cantidad_pisos.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Cantidad de pisos en el edificio</label>
                        <input v-model="form.data.pisos" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.pisos"/>
                    </div>

                    <div class="form-group mt-4">
                        <table>
                            <tbody>
                                <tr>
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
                                    <td>
                                        <small>Terreno</small>
                                        <input v-model="form.data.superficie_terreno" type="number"  min="0" step="any" class="form-control">
                                        <input-error-component :validate="form.errors.superficie_terreno"/>
                                    </td>
                                    <td>
                                        <small>Jardín</small>
                                        <input v-model="form.data.superficie_jardin" type="number"  min="0" step="any" class="form-control">
                                        <input-error-component :validate="form.errors.superficie_jardin"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div v-if="!caracteristicas.esconder_fondo_terreno.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Fondo del terreno</label>
                        <input v-model="form.data.largo" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.largo"/>
                    </div>

                    <div v-if="!caracteristicas.esconder_frente_terreno.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Frente del terreno</label>
                        <input v-model="form.data.frente" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.frente"/>
                    </div>

                    <div v-if="caracteristicas.mostrar_forma_entrega.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Forma de entrega</label>
                        <select v-model="form.data.forma_entrega_id" name="forma_entrega" id="forma_entrega" class="form-control">
                            <option v-for="item in catalogos.formas_entrega" :key="item.id" :value="item.id">{{ item.titulo }}</option>
                        </select>
                        <input-error-component :validate="form.errors.forma_entrega_id"/>
                    </div>

                    <div v-if="!caracteristicas.esconder_forma_terreno.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Forma de terreno</label>
                        <select v-model="form.data.forma_terreno_id" class="form-control">
                            <option v-for="item in catalogos.formas_terreno" :key="item.id" :value="item.id">{{ item.titulo }}</option>
                        </select>
                        <input-error-component :validate="form.errors.forma_terreno_id"/>
                    </div>

                    <div v-if="caracteristicas.mostrar_elevadores.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Elevadores</label>
                        <input v-model="form.data.elevadores" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.elevadores"/>
                    </div>

                    <div v-if="caracteristicas.mostrar_total_locales_comerciales.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Total de locales comerciales</label>
                        <input v-model="form.data.total_locales_comerciales" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.total_locales_comerciales"/>
                    </div>

                    <div v-if="caracteristicas.mostrar_numero_casas.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <label for="">Total de casas</label>
                        <input v-model="form.data.numero_casas" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.numero_casas"/>
                    </div>

                    <div v-if="caracteristicas.mostrar_anios_antiguedad.includes(form.data.tipo_inmueble_id)" class="form-group mt-4 mb-4">
                        <label for="">Antigüedad</label>
                        <select v-model="form.data.antiguedad_id" class="form-control mb-2">
                            <option v-for="item in catalogos.antiguedad" :key="item.id" :value="item.id">{{ item.titulo }}</option>
                        </select>
                        <div v-if="form.data.antiguedad_id == 1">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Mes</td>
                                        <td>Año</td>
                                    </tr>
                                    <tr>
                                        <td><input ref="mes" v-model="form.data.antiguedad_mes" @keypress="validateNumber" type="text" class="form-control" required maxlength="2"></td>
                                        <td><input ref="anio" v-model="form.data.antiguedad_anio" @keypress="validateNumber" type="text" class="form-control" required maxlength="4"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input-error-component :validate="form.errors.antiguedad_fecha"/>
                    </div>

                    <div v-if="caracteristicas.mostrar_metros_altura.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="metros_altura">Metros de altura</label>
                        <input v-model="form.data.metros_altura" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.metros_altura"/>
                    </div>
                    <div v-if="caracteristicas.mostrar_metros_altura.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="metros2_bodega">m&sup2; de bodega</label>
                        <input v-model="form.data.metros2_bodega" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.metros2_bodega"/>
                    </div>
                    <div v-if="caracteristicas.mostrar_metros_altura.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="metros2_oficina">m&sup2; de oficina</label>
                        <input v-model="form.data.metros2_oficina" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.metros2_oficina"/>
                    </div>
                    <div v-if="caracteristicas.mostrar_metros_altura.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="soporte_piso">Soporte de piso (Tons./m&sup2;)</label>
                        <input v-model="form.data.soporte_piso" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.soporte_piso"/>
                    </div>
                    <div v-if="caracteristicas.mostrar_metros_altura.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="iluminacion">% de iluminación</label>
                        <input v-model="form.data.iluminacion" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.iluminacion"/>
                    </div>

                    <div v-if="caracteristicas.mostrar_uso_suelo.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="uso_suelo">Uso de suelo</label>
                        <input v-model="form.data.uso_suelo" type="number"  min="0" step="any" class="form-control" required>
                        <input-error-component :validate="form.errors.uso_suelo"/>
                    </div>
                    <div v-if="caracteristicas.mostrar_numero_frentes.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="numero_frentes">Número de frentes</label>
                        <input v-model="form.data.numero_frentes" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.numero_frentes"/>
                    </div>
                    <div v-if="caracteristicas.mostrar_ubicacion_manzana.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="ubicacion_manzana">Ubicación en la manzana</label>
                        <input v-model="form.data.ubicacion_manzana" type="text" class="form-control">
                        <input-error-component :validate="form.errors.ubicacion_manzana"/>
                    </div>

                    <div v-if="caracteristicas.mostrar_niveles_construidos.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="">Niveles construidos</label>
                        <input v-model="form.data.niveles_construidos" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.niveles_construidos"/>
                    </div>
                    <div v-if="caracteristicas.mostrar_numero_oficinas.includes(form.data.tipo_inmueble_id)" class="form-group mt-1">
                        <label for="">Número de oficinas</label>
                        <input v-model="form.data.numero_oficinas" type="number"  min="0" step="any" class="form-control">
                        <input-error-component :validate="form.errors.numero_oficinas"/>
                    </div>

                    <div class="form-group mt-4">
                        <label for="">Estado de conservación del inmueble</label>
                        <select v-model="form.data.estado_conservacion_id" class="form-control">
                            <option v-for="item in catalogos.estado_conservacion" :key="item.id" :value="item.id">{{ item.titulo }}</option>
                        </select>
                        <input-error-component :validate="form.errors.estado_conservacion_id"/>
                    </div>
                </div>
            </div>

            <div v-if="['propiedades', 'inversiones'].includes(tipo)" class="card shadow mt-4">
                <div class="card-header">
                    <h4>Características</h4>
                </div>
                <div class="card-body">
                    <div v-if="caracteristicas.servicios.show_in.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <h5>Servicios</h5>
                        <div v-for="item in catalogos.servicios" :key="item.id">
                            <div v-if="caracteristicas.servicios.data[form.data.tipo_inmueble_id].includes(item.id)" class="mt-1">
                                <input v-model="form.data.servicios" :value="item.id" type="checkbox" :name="`servicios-${item.id}`" :id="`servicios-${item.id}`">
                                <label :for="`servicios-${item.id}`">{{ item.titulo }}</label>
                            </div>
                        </div>
                    </div>

                    <div v-if="caracteristicas.generales.show_in.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <h5>Generales</h5>
                        <div v-for="item in catalogos.generales" :key="item.id">
                            <div v-if="caracteristicas.generales.data[form.data.tipo_inmueble_id].includes(item.id)" class="mt-1">
                                <input v-model="form.data.generales" :value="item.id" type="checkbox" :name="`generales-${item.id}`" :id="`generales-${item.id}`">
                                <label :for="`generales-${item.id}`">{{ item.titulo }}</label>
                            </div>
                        </div>
                    </div>

                    <div v-if="caracteristicas.exteriores.show_in.includes(form.data.tipo_inmueble_id)" class="form-group mt-4">
                        <h5>Exteriores</h5>
                        <div v-for="item in catalogos.exteriores" :key="item.id">
                            <div v-if="caracteristicas.exteriores.data[form.data.tipo_inmueble_id].includes(item.id)" class="mt-1">
                                <input v-model="form.data.exteriores" :value="item.id" type="checkbox" :name="`exteriores-${item.id}`" :id="`exteriores-${item.id}`">
                                <label :for="`exteriores-${item.id}`">{{ item.titulo }}</label>
                            </div>
                        </div>
                    </div>

                    <div v-if="caracteristicas.amenidades.show_in.includes(form.data.tipo_inmueble_id)"  class="form-group mt-4">
                        <h5>Amenidades</h5>
                        <div v-for="item in catalogos.amenidades" :key="item.id">
                            <div v-if="caracteristicas.amenidades.data[form.data.tipo_inmueble_id].includes(item.id)" class="mt-1">
                                <input v-model="form.data.amenidades" :value="item.id" type="checkbox" :name="`amenidades-${item.id}`" :id="`amenidades-${item.id}`">
                                <label :for="`amenidades-${item.id}`">{{ item.titulo }}</label>
                            </div>
                        </div>
                    </div>

                    <div v-if="caracteristicas.restricciones.show_in.includes(form.data.tipo_inmueble_id)"  class="form-group mt-4">
                        <h5>Restricciones</h5>
                        <div v-for="item in catalogos.restricciones" :key="item.id">
                            <div v-if="caracteristicas.restricciones.data[form.data.tipo_inmueble_id].includes(item.id)" class="mt-1">
                                <input v-model="form.data.restricciones" :value="item.id" type="checkbox" :name="`restricciones-${item.id}`" :id="`restricciones-${item.id}`">
                                <label :for="`restricciones-${item.id}`">{{ item.titulo }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="tipo==`inversiones`" class="card shadow mt-4 mb-4">
                <div class="card-header">
                    <span v-if="!form.data.id" class="text-warning">Para agregar elementos a esta inversión, antes es necesario guardar los cambios.</span>
                    <button v-else class="btn btn-primary" @click="openModal(inversion)">
                        <i class="bi bi-building"></i> Agregar
                    </button>
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

                        <template slot="precio" slot-scope="props">
                            <span v-if="props.rowData.estatus == `disponible`" class="badge bg-success">
                                {{ props.rowData.precio_moneda }}
                            </span>
                            <span v-if="props.rowData.estatus == `apartado`" class="badge bg-warning">
                                {{ props.rowData.estatus }}
                            </span>
                            <span v-if="props.rowData.estatus == `vendido`" class="badge bg-danger">
                                {{ props.rowData.estatus }}
                            </span>
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
            keywords: '',
            fields: [
                {
                    name: 'id',
                    title: '#'
                },
                {
                    name: 'titulo',
                    title: 'Título'
                },
                {
                    name: 'estacionamientos',
                    title: 'Parking'
                },
                {
                    name: 'nivel',
                    sortField: 'nivel',
                    title: 'Nivel'
                },
                {
                    name: 'm2_numero',
                    title: 'M&sup2;'
                },
                {
                    name: 'habitaciones',
                    title: 'Habitaciones'
                },
                {
                    name: 'banios',
                    title: 'Baños'
                },
                {
                    name: 'balcones',
                    title: 'Balcones'
                },
                {
                    name: 'patio_numero',
                    title: 'Patio'
                },
                {
                    name: 'm2_total',
                    title: 'M&sup2; Totales'
                },
                {
                    name: '__slot:precio',
                    title: 'Precio',
                },
                {
                    name: '__slot:right-chevron',
                    title: '',
                    dataClass: 'text-right aligned',
                },
            ],
            css: CssForBootstrap4,
            sortOrder: [
                { field: 'id', sortField: 'id', direction: 'desc'}
            ],
            moreParams: {},
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
            if(this.caracteristicas.mostrar_anios_antiguedad.includes(this.form.data.tipo_inmueble_id)){
                if(this.form.data.antiguedad_id == 1){
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
                }
            }

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
            this.form.get('ajax/catalogos/todos', {}).then(result => {
                this.catalogos.tipo_operacion = result.data.tipo_operacion
                this.catalogos.paises = result.data.paises
                this.catalogos.estados = result.data.estados
                this.catalogos.tipo_inmueble = result.data.tipo_inmueble
                this.catalogos.estado_conservacion = result.data.estado_conservacion
                this.catalogos.servicios = result.data.servicios
                this.catalogos.generales = result.data.generales
                this.catalogos.exteriores = result.data.exteriores
                this.catalogos.amenidades = result.data.amenidades
                this.catalogos.restricciones = result.data.restricciones
                this.catalogos.formas_entrega = result.data.formas_entrega
                this.catalogos.formas_terreno = result.data.formas_terreno
                this.catalogos.antiguedad = result.data.antiguedad
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

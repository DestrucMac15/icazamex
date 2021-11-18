<template>
    <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  Agregar elemento de inversión
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                  <div class="form-group mt-2">
                    <label for="titulo">Título</label>
                    <input v-model="form.data.titulo" class="form-control" name="titulo" type="text">
                  </div>
                  <div class="form-group mt-2">
                    <label for="habitaciones">Habitaciones</label>
                    <input v-model="form.data.habitaciones" class="form-control" name="habitaciones" type="number" step="any">
                  </div>
                  <div class="form-group mt-2">
                    <label for="">Baños</label>
                    <input v-model="form.data.banios" class="form-control" type="number" step="any">
                  </div>
                  <div class="form-group mt-2">
                    <label for="">Balcones</label>
                    <input v-model="form.data.balcones" class="form-control" type="number" step="any">
                  </div>
                  <div class="form-group mt-2">
                    <label for="">Estacionamientos</label>
                    <input v-model="form.data.estacionamientos" class="form-control" type="number" step="any">
                  </div>
                  <div class="form-group mt-2">
                    <label for="">Nivel</label>
                    <input v-model="form.data.nivel" class="form-control" type="text">
                  </div>
                  <div class="form-group mt-2">
                    <label for="">M&sup2;</label>
                    <input v-model="form.data.m2" class="form-control" type="number" step="any">
                  </div>
                  <div class="form-group mt-2">
                    <label for="">M&sup2; Patio</label>
                    <input v-model="form.data.patio" class="form-control" type="number" step="any">
                  </div>

                  <div class="form-group mt-2">
                    <label for="">Precio</label>
                    <input v-model="form.data.precio" class="form-control" type="number" step="any">
                  </div>

                  <div class="form-group mt-2">
                    <label for="">Estatus</label>
                    <select v-model="form.data.estatus" class="form-control">
                        <option value="disponible">Disponible</option>
                        <option value="apartado">Apartado</option>
                        <option value="vendido">Vendido</option>
                    </select>
                  </div>

                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  <button v-if="form.data.id" class="btn btn-danger mr-8" @click="confirmDeletion">
                    <i class="bi bi-trash"></i>
                    Eliminar
                  </button>
                  <button class="btn btn-default" @click="$emit('close')">
                    Cancelar
                  </button>
                  <button class="btn btn-primary" @click="save">
                    Aceptar
                  </button>
                </slot>
              </div>
            </div>
          </div>
        </div>
    </transition>
</template>
<script>
import Form from '../../Form'
import Swal from 'sweetalert2'
export default {
    props: {
        inmueble_id: {
            type: Number,
            default: null
        }
    },
    data(){
        return {
            form: new Form({})
        }
    },
    methods: {
        save(){
            if(this.form.data.id){
                this.form.put(`inversiones-item/${this.form.data.id}`).then(result => {
                    this.$emit('refresh')
                })
            }
            else{
                this.form.post(`inversiones-item`).then(result => {
                    this.$emit('refresh')
                })
            }
        },
        set(item){
            if(item){
                this.form = new Form(item)
            }
            else{
                this.form = new Form({})
            }
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
                    this.form.delete(`inversiones-item/${this.form.data.id}`).then(response => {
                        Swal.fire({
                            title: 'Eliminado!',
                            text: `${deleted} ha sido eliminado.`,
                            icon: 'success'
                        }).then(result => {
                            this.$emit('refresh')
                        })
                    })
                } else if (result.dismiss === Swal.DismissReason.cancel) {/* Read more about handling dismissals below */

                }
            })
        },
    }
}
</script>
<style scoped>
.modal-mask {
  position: fixed;

  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 50%;
  margin: 0px auto;
  padding: 10px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

</style>

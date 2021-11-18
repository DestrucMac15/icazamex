class Catalogos{
    constructor() {
        this.tipo_operacion = []
        this.paises = []
        this.estados = []
        this.tipo_inmueble = []
        this.estado_conservacion = []
        this.servicios = []
        this.generales = []
        this.exteriores = []
        this.amenidades = []
        this.restricciones = []
        this.localidades = []
        this.municipios = []
        this.formas_entrega = []
        this.formas_terreno = []
    }

    reset(){
    }

    post(url){
        return new Promise((resolve, reject) => {
            axios.post(url, this.data).then(response => {
                this.errors = {}
                resolve(response)
            }).catch(error => {
                this.errors = error.response.data.errors
                resolve(error.response)
            })
        })
    }

    put(url){
        return new Promise((resolve, reject) => {
            axios.put(url, this.data).then(response => {
                this.errors = {}
                resolve(response)
            }).catch(error => {
                this.errors = error.response.data.errors
                reject(error.response)
            })
        })
    }

    get(url, data){
        var params = {
            params: data
        }
        return new Promise((resolve, reject) => {
            axios.get(url, params).then(response => {
                this.errors = {}
                resolve(response)
            }).catch(error => {
                this.errors = error.response.data.errors
                reject(error.response)
            })
        })
    }

    delete(url){
        return new Promise((resolve, reject) => {
            axios.delete(url, this.data).then(response => {
                this.errors = {}
                resolve(response)
            }).catch(error => {
                this.errors = error.response.data.errors
                reject(error.response)
            })
        })
    }
}

export default Catalogos

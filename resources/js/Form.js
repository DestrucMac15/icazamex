import axios from 'axios'
class Form{
    constructor(input) {
        this.input = input
        this.data = JSON.parse(JSON.stringify(input))
        this.data.antiguedad_fecha = new Date(this.data.antiguedad_fecha)
        this.errors = {}
    }

    reset(){
        this.data = JSON.parse(JSON.stringify(this.input))
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
                resolve(error.response)
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
                resolve(error.response)
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
                resolve(error.response)
            })
        })
    }
}

export default Form

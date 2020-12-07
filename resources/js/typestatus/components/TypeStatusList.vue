

<template>

    <section>
        <div>
            <h1>Listado de typeStatus</h1>
        </div>
        <div>
            <article>
                <form>
                    <div>
                        <label for="">Nombres</label>
                        <input type="text" name="name" v-model="name">
                    </div>
                    <div>
                        <a @click="search">Buscar</a>
                        <a  @click="show('typeStatusInsert')">Crear</a>
                    </div>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="est in typestatusList">
                            <td>{{  est.id  }}</td>
                            <td>{{  est.name  }}</td>
                            <td>
                                <a @click="show('typeStatusEdit', est.id)">Editar</a>
                            </td>
                            <td>
                                <a @click="deletes(est.id)">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </article>
        </div>
    </section>

</template>

<script>

    export default{
        name: "typestatus-list-component",
        data(){
            return{
                typestatusList : [],
                name : ''
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            }
        },
        methods:{
            show: function(component, id){
                this.$emit('onShowComponent',component,id)
            },
            deletes: function(id){
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/estats/" + id

                axios
                    .delete(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            alert(response.data.message)
                            that.search()
                        }else{
                            alert(response.data.message)
                        }
                    })
                    .catch((response) =>{
                        alert(error.data.message)
                    })
            },
            search: function(){
                let that = this
                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/estats?name=" + this.name

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.typestatusList = response.data.data
                        }else{
                            alert(response.data.message)
                        }
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
        }
    }
</script>
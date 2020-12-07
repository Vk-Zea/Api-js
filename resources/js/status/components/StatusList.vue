<template>

    <section>
        <div>
            <h1>Listado de Status</h1>
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
                        <a @click="show('StatusInsert')">Crear</a>
                    </div>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>type_status_id</th>
                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="est in statusList">
                            <td>{{  est.id  }}</td>
                            <td>{{  est.name  }}</td>
                            <td>{{  est.type_status_id  }}</td>
                            <td>
                                <a @click="show('StatusEdit', est.id)">Editar</a>
                            </td>
                            <td>
                                <a  @click="deleteS(est.id)">Eliminar</a>
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
        name: "status-list-component",
        data(){
            return{
                statusList : [],
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
            deleteS: function(id){
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/statuses/" + id

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

                let url = this.base_url + "/api/statuses?name=" + this.name

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.statusList = response.data.data
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


<template>

    <section>
        <div>
            <h1>Listado de Roles</h1>
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
                        <a @click="show('RolInsert')">Crear</a>
                    </div>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>status_id</th>
                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="rol in rolList">
                            <td>{{  rol.id  }}</td>
                            <td>{{  rol.name  }}</td>
                            <td>{{  rol.status_id  }}</td>
                            <td>
                                <a @click="show('RolEdit', rol.id)" >Editar</a>
                            </td>
                            <td>
                                <a @click="deleter(rol.id)" >Eliminar</a>
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
        name: "rol-list-component",
        data(){
            return{
                rolList : [],
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
            deleter: function(id){
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/roles/" + id

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

                let url = this.base_url + "/api/roles?name=" + this.name

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.rolList = response.data.data
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
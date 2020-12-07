<template>

    <section>
        <div>
            <h1>Listado de Usuarios</h1>
        </div>
        <div>
            <article>
                    <div>
                        <label for="">Nombres</label>
                        <input type="text" name="name" v-model="name" @keyup.enter="search">
                    </div>
                    <div>
                        <button @click="search">Buscar</button>
                        <button @click="showc('UserInsert')">Crear</button>
                    </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Status id</th>
                            <th>Rol id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in userList">
                            <td>{{  user.name  }}</td>
                            <td>{{  user.email  }}</td>
                            <td>{{  user.status_id  }}</td>
                            <td>{{  user.rol_id  }}</td>
                            <td>
                                <button @click="showc('UserEdit', user.id)">Editar</button>
                            </td>
                            <td>
                                <button @click="deleteC(user.id)">Eliminar</button>
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
        name: "category-list-component",
        data(){
            return{
                userList : [],
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
            showc: function(component, id){
                this.$emit('onShowComponent',component,id)
            },
            deleteC: function(id){
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/users/" + id

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

                let url = this.base_url + "/api/users?name=" + this.name

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.userList = response.data.data
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
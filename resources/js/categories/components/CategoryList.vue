

<template>

    <section>
        <div>
            <h1>Listado de categorias</h1>
        </div>
        <div>
            <article>
                    <div>
                        <label for="">Nombres</label>
                        <input type="text" name="name" v-model="name" @keyup.enter="search">
                    </div>
                    <div>
                        <button @click="search">Buscar</button>
                        <button @click="showc('CategoryInsert')">Crear</button>
                    </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="category in categoryList">
                            <td>{{  category.name  }}</td>
                            <td>{{  category.status_id  }}</td>
                            <td>
                                <button @click="showc('CategoryEdit', category.id)">Editar</button>
                            </td>
                            <td>
                                <button @click="deleteC(category.id)">Eliminar</button>
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
                categoryList : [],
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

                let url = this.base_url + "/api/categories/" + id

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

                let url = this.base_url + "/api/categories?name=" + this.name

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.categoryList = response.data.data
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


<template>

    <section>
        <div>
            <h1>Listado de Movies</h1>
        </div>
        <div>
            <article>
                <form>
                    <div>
                        <label for="">Nombres</label>
                        <input type="text" name="name" v-model="name">
                    </div>
                    <div>
                        <a @click="search" >Buscar</a>
                        <a @click="show('MovieInsert')" >Crear</a>
                    </div>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>descripcion</th>
                            <th>status_id</th>
                            <th>user_id</th>
                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="movie in movieList">
                            <td>{{  movie.id  }}</td>
                            <td>{{  movie.name  }}</td>
                            <td>{{  movie.description  }}</td>
                            <td>{{  movie.status_id  }}</td>
                            <td>{{  movie.user_id  }}</td>
                            <td>
                                <a @click="show('MovieEdit', movie.id)">Editar</a>
                            </td>
                            <td>
                                <a @click="deleteM(movie.id)">Eliminar</a>
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
        name: "movie-list-component",
        data(){
            return{
                movieList : [],
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
            deleteM: function(id){
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/movies/" + id

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

                let url = this.base_url + "/api/movies?name=" + this.name

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.movieList = response.data.data
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


<template>

    <section>
        <div>
            <h1>Editar categoria</h1>
        </div>
        <div>
            <article>
                <div>
                    <label>Nombre</label>
                    <input type="text" v-model="movie.name">
                </div>
                <div>
                    <label>Descripcion</label>
                    <input type="text" v-model="movie.description">
                </div>
                <div>
                    <label>status id</label>
                    <input type="text" v-model="movie.status_id">
                </div>
                <div>
                    <label>user id</label>
                    <input type="text" v-model="movie.user_id">
                </div>
                <div>
                     <button @click="edit">Editar</button>
                    <button @click="close">Cancelar</button>
                </div>
            </article>
        </div>
    </section>

</template>

<script>

    export default{
        name: "movie-edit-component",
        data(){
            return{
                movie : {
                    name : '',
                    description: '',
                    status_id: '',
                    user_id: ''
                }
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            },
            MovieId: {
                type: Number,
                default: ''
            }
        },
        methods:{
            close: function(){
                this.$emit('onShowComponent','MovieList')
            },
            getMovie: function (params) {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/movies/" + this.MovieId

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.movie = response.data.data.movie;
                        }else{
                            alert(response.data.message)
                        }
                    })
                    .catch((response) =>{
                        alert(error.data.message)
                    })
                
            },
            edit: function() {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/movies/" + this.MovieId

                let data = {
                    name: this.movie.name,
                    description: this.movie.description,
                    status_id: this.movie.status_id,
                    user_id: this.movie.user_id
                }

                axios
                    .put(url, data, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            alert(response.data.message)
                            this.close()
                        }else{
                            alert(response.data.message)
                        }
                    })
                    .catch((response) =>{
                        alert(error.data.message)
                    })
            }
        },
        mounted(){
                this.getMovie();
            }
    }
</script>
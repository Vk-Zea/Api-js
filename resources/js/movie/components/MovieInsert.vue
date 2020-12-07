

<template>

    <section>
        <div>
            <h1>Nueva Pelicula</h1>
        </div>
        <div>
            <article>
                <div>
                    <label>Nombre</label>
                    <input type="text" v-model="name">
                </div>
                <div>
                    <label>Descripcion</label>
                    <input type="text" v-model="description">
                </div>
                <div>
                    <label>status id</label>
                    <input type="text" v-model="status">
                </div>
                <div>
                    <label>user id</label>
                    <input type="text" v-model="user">
                </div>
                <div>
                    <button @click="insert">Enviar</button>
                    <button @click="close">Cancelar</button>
                </div>
            </article>
        </div>
    </section>

</template>

<script>

    export default{
        name: "category-insert-component",
        data(){
            return{
                name : '',
                description : '',
                status : '',
                user : ''
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            }
        },
        methods:{
            close: function(){
                this.$emit('onShowComponent','MovieList')
            },
            insert: function() {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/movies"

                let data = {
                    name: this.name,
                    description: this.description,
                    status: this.status,
                    user: this.user
                }

                axios
                    .post(url, data, headers)
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
        }
    }
</script>
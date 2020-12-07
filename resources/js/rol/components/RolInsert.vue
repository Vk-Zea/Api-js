
<template>

    <section>
        <div>
            <h1>Nuevo rol</h1>
        </div>
        <div>
            <article>
                <div>
                    <label>Nombre</label>
                    <input type="text" v-model="name" @keyup.enter="insert">
                </div>
                <div>
                    <label>estatus</label>
                    <input type="text" v-model="status" @keyup.enter="insert">
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
        name: "rol-insert-component",
        data(){
            return{
                name : '',
                status: ''
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
                this.$emit('onShowComponent','RolList')
            },
            insert: function() {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/roles"

                let data = {
                    name: this.name,
                    status_id: this.status
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
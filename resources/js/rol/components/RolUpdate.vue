<template>

    <section>
        <div>
            <h1>Editar Rol</h1>
        </div>
        <div>
            <article>
                <div>
                    <label>Nombre</label>
                    <input type="text" v-model="rol.name" >
                </div>
                <div>
                    <label>status</label>
                    <input type="text" v-model="rol.status_id" >
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
        name: "rol-edit-component",
        data(){
            return{
                rol : {
                    name : "",
                    status_id: ""
                }
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            },
            RolId: {
                type: Number,
                default: ''
            }
        },
        methods:{
            close: function(){
                this.$emit('onShowComponent','RolList')
            },
            getRol: function (params) {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/roles/" + this.RolId

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.rol = response.data.data;
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

                let url = this.base_url + "/api/roles/" + this.RolId

                console.log(this.rol.name);

                let data = {
                    name: this.rol.name,
                    status_id: this.rol.status_id
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
                this.getRol();
            }
    }
</script>
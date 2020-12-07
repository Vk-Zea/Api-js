<template>

    <section>
        <div>
            <h1>Editar Usuario</h1>
        </div>
        <div>
            <article>
                 <div>
                    <label>Nombre</label>
                    <input type="text" v-model="user.name" @keyup.enter="edit">
                </div>
                <div>
                    <label>Email</label>
                    <input type="text" v-model="user.email" @keyup.enter="edit">
                </div>
                <div>
                    <label>Status id</label>
                    <input type="text" v-model="user.status_id" @keyup.enter="edit">
                </div>
                <div>
                    <label>Rol Id</label>
                    <input type="text" v-model="user.rol_id" @keyup.enter="edit">
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
        name: "category-edit-component",
        data(){
            return{
                user : {
                    name : "",
                    email : "",
                    status_id: "",
                    rol_id : ""
                }
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            },
            UserId: {
                type: Number,
                default: ''
            }
        },
        methods:{
            close: function(){
                this.$emit('onShowComponent','UserList')
            },
            getUsuario: function (params) {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/users/" + this.UserId

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.user = response.data.data.user;
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

                let url = this.base_url + "/api/users/" + this.UserId

                let data = {
                    name: this.user.name,
                    email: this.user.email,
                    status: this.user.status_id,
                    rol: this.user.rol_id
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
                this.getUsuario();
            }
    }
</script>
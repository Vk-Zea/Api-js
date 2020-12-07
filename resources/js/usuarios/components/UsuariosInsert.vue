<template>
    <section>
        <div>
            <h1>Nuevo usuario</h1>
        </div>
        <div>
            <article>
                <div>
                    <label>Nombre</label>
                    <input type="text" v-model="name" @keyup.enter="insert">
                </div>
                <div>
                    <label>Email</label>
                    <input type="text" v-model="email" @keyup.enter="insert">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" v-model="password" @keyup.enter="insert">
                </div>
                <div>
                    <label>Status id</label>
                    <input type="text" v-model="status" @keyup.enter="insert">
                </div>
                <div>
                    <label>Rol Id</label>
                    <input type="text" v-model="rol" @keyup.enter="insert">
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
        name: "user-insert-component",
        data(){
            return{
                name : '',
                email : '',
                password : '',
                status : '',
                rol : ''
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
                this.$emit('onShowComponent','UserList')
            },
            insert: function() {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/users"

                let data = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    status: this.status,
                    rol: this.rol
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
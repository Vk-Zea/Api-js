<template>

    <section>
        <div>
            <h1>Editar type status</h1>
        </div>
        <div>
            <article>
                <div>
                    <label>Nombre</label>
                    <input type="text" v-model="typestatus.name" @keyup.enter="edit">
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
                typestatus : {
                    name : ""
                }
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            },
            TypestatusId: {
                type: Number,
                default: ''
            }
        },
        methods:{
            close: function(){
                this.$emit('onShowComponent','typeStatusList')
            },
            getCategory: function (params) {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/estats/" + this.TypestatusId

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.typestatus = response.data.data;
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

                let url = this.base_url + "/api/estats/" + this.TypestatusId

                let data = {
                    name: this.typestatus.name
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
                this.getCategory();
            }
    }
</script>
<template>

    <section>
        <div>
            <h1>Editar Status</h1>
        </div>
        <div>
            <article>
                <div>
                    <label>Nombre</label>
                    <input type="text" v-model="status.name" @keyup.enter="edit">
                </div>
                <div>
                    <label>type status</label>
                    <input type="text" v-model="status.type_status_id" @keyup.enter="edit">
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
        name: "status-edit-component",
        data(){
            return{
                status : {
                    name : "",
                    type_status_id: ""
                }
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            },
            StatusId: {
                type: Number,
                default: ''
            }
        },
        methods:{
            close: function(){
                this.$emit('onShowComponent','StatusList')
            },
            getStatus: function (params) {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/statuses/" + this.StatusId

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.status = response.data.data;
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

                let url = this.base_url + "/api/statuses/" + this.StatusId

                let data = {
                    name: this.status.name,
                    status_type: this.status.type_status_id
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
                this.getStatus();
            }
    }
</script>
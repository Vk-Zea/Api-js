

<template>

    <section>
        <div>
            <h1>Nuevo Rental</h1>
        </div>
        <div>
            <article>
                <div>
                    <label>Fecha de inicio</label>
                    <input type="text" v-model="start_date">
                </div>
                <div>
                    <label>Fecha de fin</label>
                    <input type="text" v-model="end_date">
                </div>
                <div>
                    <label>total</label>
                    <input type="text" v-model="total">
                </div>
                <div>
                    <label>user id</label>
                    <input type="text" v-model="user_id">
                </div>
                <div>
                    <label>status id</label>
                    <input type="text" v-model="status_id">
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
                start_date : '',
                end_date : '',
                total : '',
                user_id : '',
                status_id: ''
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
                this.$emit('onShowComponent','RentalList')
            },
            insert: function() {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/rentals"

                let data = {
                    start_date: this.start_date,
                    end_date: this.end_date,
                    total: this.total,
                    user_id: this.user_id,
                    status_id: this.status_id
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
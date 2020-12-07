

<template>

    <section>
        <div>
            <h1>Editar Rental</h1>
        </div>
        <div>
            <article>
                <div>
                    <label>Fecha de inicio</label>
                    <input type="text" v-model="rental.start_date">
                </div>
                <div>
                    <label>Fecha de fin</label>
                    <input type="text" v-model="rental.end_date">
                </div>
                <div>
                    <label>total</label>
                    <input type="text" v-model="rental.total">
                </div>
                <div>
                    <label>user id</label>
                    <input type="text" v-model="rental.user_id">
                </div>
                <div>
                    <label>status id</label>
                    <input type="text" v-model="rental.status_id">
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
        name: "rental-edit-component",
        data(){
            return{
                rental : {
                    start_date : '',
                    end_date: '',
                    total:'',
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
            RentalId: {
                type: Number,
                default: ''
            }
        },
        methods:{
            close: function(){
                this.$emit('onShowComponent','RentalList')
            },
            getRental: function (params) {
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/rentals/" + this.RentalId

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.rental = response.data.data;
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

                let url = this.base_url + "/api/rentals/" + this.RentalId

                let data = {
                    start_date: this.rental.start_date,
                    end_date: this.rental.end_date,
                    total: this.rental.total,
                    status_id: this.rental.status_id,
                    user_id: this.rental.user_id
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
                this.getRental();
            }
    }
</script>
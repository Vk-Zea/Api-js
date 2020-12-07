

<template>

    <section>
        <div>
            <h1>Listado de Rentals</h1>
        </div>
        <div>
            <article>
                <form>
                    <div>
                        <label for="">Fecha</label>
                        <input type="text" name="name" v-model="date">
                    </div>
                    <div>
                        <a @click="search" >Buscar</a>
                        <a @click="show('RentalInsert')" >Crear</a>
                    </div>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>start_date</th>
                            <th>end_date</th>
                            <th>total</th>
                            <th>user_id</th>
                            <th>status_id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="ren in rentalList">
                            <td>{{  ren.id  }}</td>
                            <td>{{  ren.start_date  }}</td>
                            <td>{{  ren.end_date  }}</td>
                            <td>{{  ren.total  }}</td>
                            <td>{{  ren.user_id  }}</td>
                            <td>{{  ren.status_id  }}</td>
                            <td>
                                <a @click="show('RentalEdit', ren.id)">Editar</a>
                            </td>
                            <td>
                                <a @click="deleteM(ren.id)">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </article>
        </div>
    </section>

</template>

<script>

    export default{
        name: "movie-list-component",
        data(){
            return{
                rentalList : [],
                date : ''
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            }
        },
        methods:{
            show: function(component, id){
                this.$emit('onShowComponent',component,id)
            },
            deleteM: function(id){
                let that = this;

                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/rentals/" + id

                axios
                    .delete(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            alert(response.data.message)
                            that.search()
                        }else{
                            alert(response.data.message)
                        }
                    })
                    .catch((response) =>{
                        alert(error.data.message)
                    })
            },
            search: function(){
                let that = this
                let headers = {
                    headers: {
                        "Content-Type": "aplication/json"
                    }
                }

                let url = this.base_url + "/api/rentals?start_date=" + this.date

                axios
                    .get(url, headers)
                    .then((response) => {
                        if(response.data.type === 'success'){
                            that.rentalList = response.data.data
                        }else{
                            alert(response.data.message)
                        }
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
        }
    }
</script>
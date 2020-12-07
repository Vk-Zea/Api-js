

<template>

    <div>
        <section>
            <h1>Ejemplo formulario</h1>
        </section>
        <section>
            <div>
                <label for="">Nombre</label>
                <input type="text" name="Firstname" id="" v-model="Firstname">
            </div>
            <div>
                <label for="">Apellido</label>
                <input type="text" name="LastName" id="" v-model="LastName">
            </div>
            <div>
                <label for="">Correo</label>
                <input type="text" name="Correo" id="" v-model="Correo">
            </div>
            <div>
                <button @click="submit" type="submit">Enviar</button>
            </div>
        </section>
    </div>

</template>

<script>
    export default{
        name: "Example",
        data(){
            return{
                Firstname: '',
                LastName: '',
                Correo: ''
            };
        },

        methods: {
            submit: function(){
                console.log("Firtsname", this.Firstname)
                console.log("LastName", this.LastName)
                console.log("Correo", this.Correo)
            }
        }
    }
</script>
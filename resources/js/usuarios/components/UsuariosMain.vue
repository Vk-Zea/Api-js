<template>

    <div>
        <div v-if="showComponent === 'UserList'">
            <user-list-component :base_url="base_url" @onShowComponent="setShowComponent"> </user-list-component>
        </div>
        <div v-if="showComponent === 'UserInsert'">
            <user-insert-component :base_url="base_url" @onShowComponent="setShowComponent"> </user-insert-component>
        </div>
        <div v-if="showComponent === 'UserEdit'">
            <user-edit-component :base_url="base_url" :UserId="UserId" @onShowComponent="setShowComponent"> </user-edit-component>
        </div>

    </div>

</template>

<script>

    import CategoryList from "./UsuariosList.vue"
    import CategoryInsert from "./UsuariosInsert.vue"
    import CategoryEdit from "./UsuariosUpdate.vue"

    export default{
        name: "user-main-component",
        components:{
            "user-list-component": CategoryList,
            "user-insert-component": CategoryInsert,
            "user-edit-component": CategoryEdit
        },
        data(){
            return{
                showComponent: '',
                UserId: ''
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            }
        },
        methods:{
            setShowComponent: function(component, id){
                this.UserId = id
                this.showComponent = component
            },
        },
        mounted(){
            this.setShowComponent("UserList")
        }
    }
</script>


<template>

    <div>
        <div v-if="showComponent === 'RolList'">
            <rol-list-component :base_url="base_url" @onShowComponent="setShowComponent"> </rol-list-component>
        </div>
        <div v-if="showComponent === 'RolInsert'">
            <rol-insert-component :base_url="base_url" @onShowComponent="setShowComponent"> </rol-insert-component>
        </div>
        <div v-if="showComponent === 'RolEdit'">
            <rol-edit-component :base_url="base_url" :RolId="RolId" @onShowComponent="setShowComponent"> </rol-edit-component>
        </div>
    </div>

</template>

<script>

    import RolList from "./RolList.vue"
    import RolInsert from "./RolInsert.vue"
    import RolEdit from "./RolUpdate.vue"

    export default{
        name: "rol-main-component",
        components:{
            "rol-list-component": RolList,
            "rol-insert-component": RolInsert,
            "rol-edit-component": RolEdit
        },
        data(){
            return{
                showComponent: '',
                RolId: ''
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
                this.RolId = id
                this.showComponent = component
            }
        },
        mounted(){
            this.setShowComponent("RolList")
        }
    }
</script>
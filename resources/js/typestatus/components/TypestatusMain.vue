

<template>

    <div>
        <div v-if="showComponent === 'typeStatusList'">
            <typestatus-list-component :base_url="base_url" @onShowComponent="setShowComponent"> </typestatus-list-component>
        </div>
        <div v-if="showComponent === 'typeStatusInsert'">
            <typestatus-insert-component :base_url="base_url" @onShowComponent="setShowComponent"> </typestatus-insert-component>
        </div>
        <div v-if="showComponent === 'typeStatusEdit'">
            <typestatus-edit-component :base_url="base_url" :TypestatusId="TypestatusId" @onShowComponent="setShowComponent"> </typestatus-edit-component>
        </div>
    </div>

</template>

<script>

    import typeStatusList from "./TypeStatusList.vue"
    import typeStatusInsert from "./typeStatusInsert.vue"
    import typeStatusEdit from "./typeStatusUpdate.vue"

    export default{
        name: "typestatus-main-component",
        components:{
            "typestatus-list-component": typeStatusList,
            "typestatus-insert-component": typeStatusInsert,
            "typestatus-edit-component": typeStatusEdit
        },
        data(){
            return{
                showComponent: '',
                TypestatusId: ''
            };
        },
        props:{
            base_url: {
                type: String,
                default: ''
            }
        },
        methods:{
            setShowComponent: function(component,id){
                this.TypestatusId = id;
                this.showComponent = component
            }
        },
        mounted(){
            this.setShowComponent("typeStatusList")
        }
    }
</script>
<template>
    <select v-model="deleted" class="form-control">
        <option value=false>Active {{model}}</option>
        <option value=true>All {{model}}</option>
    </select>
</template>
<script>
export default {
    props:['path', 'model', 'all_path', 'base_path'],
    data() {
        return {
            deleted: false,
            mounting:true
        }
    },
    watch:{
        deleted (val){
            if(this.mounting)
                return;

            if(this.deleted == "false"){
                window.location.href=this.base_path;
            } else{
                window.location.href=this.all_path
            }
        }
    },
    created(){
        if(this.path==this.all_path)
            this.deleted=true;
    },
    mounted(){
        this.$nextTick( () => {this.mounting = false;});
    }
}
</script>

<style scoped>
    select {
        width:auto;

    }
</style>


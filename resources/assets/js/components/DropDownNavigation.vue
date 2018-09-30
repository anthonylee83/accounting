<template>
    <select v-model="deleted" class="form-control">
        <option value=false>Active Users</option>
        <option value=true>All Users</option>
    </select>
</template>
<script>
export default {
    props:['path'],
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
                window.location.href="/admin/users";
            } else{
                window.location.href="/admin/users/all"
            }
        }
    },
    created(){
        if(this.path=="admin/users/all")
            this.deleted=true;
    },
    mounted(){
        this.$nextTick( () => {this.mounting = false;});
    }
}
</script>

<style scoped>
    select {
        width:15%;

    }
</style>


<template>
    <select v-model="state" class="form-control">
        <option value=1>Pending Journal Entries</option>
        <option value=2>Approved Journal Entries</option>
        <option value=3>Rejected Journal Entries</option>
    </select>
</template>
<script>
export default {
    props:['path', 'pending_path', 'approved_path', 'base_path'],
    data() {
        return {
            state: 1,
            mounting:true
        }
    },
    watch:{
        state (val){
            if(this.mounting)
                return;

            
            window.location.href=this.base_path +'/' + this.state;
        }
    },
    created(){
        if(this.path==this.pending_path || this.path == '/journal/1'){
            this.state = 1;
        }else if(this.path==this.approved_path){
            this.state = 2;
        }else {
            this.state = 3;
        }
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


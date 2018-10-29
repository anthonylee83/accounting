<template> 
    <div class="row">
        <div class="col-3">
            <dropdown :options="accounts" @selected="_selected"  placeholder="Please select an account" />
        </div>
        <div class="col-4">
            <input type="text" name="description" class="description form-control" v-model="transaction.description">
        </div>
        <div class="col-2">
            <input type="number" name="debit" min="0" step="0.01" class="debit form-control" :disabled="debit" v-model=transaction.debit>
        </div>
         <div class="col-2">
            <input type="number" name="credit" min="0" step="0.01" class="credit form-control" :disabled="credit" v-model=transaction.credit>
        </div>
        <div class="col-1 d-flex justify-content-betweeen">
            <button type="button" class="close" @click="$emit('delete-row', transaction)" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <a v-if="last" @click="$emit('new-row')" class="btn btn-lg btn-info btn-circle text-right" role="button"><i class="fas fa-plus text-white"></i></a>
    </div>
</template>

<script>
export default {
    props: ['transaction', 'first', 'last', 'accounts'],
    data() {
        return {
            isDebit: false
        }
    },
    computed: {
        credit () {
            return this.isDebit  || this.transaction.debit > 0 ? true : false;
        },
         debit () {
            return this.transaction.credit > 0 ? true : false;
        }
    },
    mounted () {
        this.transaction.key = this.$vnode.key;
        if(this.first)
            this.isDebit = true;
            
    },
    methods:{ 
        _selected(event) {
            this.transaction.account_id = event.id;
        }
    }

}
</script>
<style>
.row{
    margin: .5rem 0;
}
</style>

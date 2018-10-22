<template> 
    <div class="row">
        <div class="col-3">
            <dropdown :options="accounts" @selected="_selected"  placeholder="Please select an account" />
        </div>
        <div class="col-5">
            <input type="text" name="description" class="description form-control" v-model="transaction.description">
        </div>
        <div class="col-2">
            <input type="number" name="debit" min="0" class="debit form-control" :disabled="debit" v-model=transaction.debit>
        </div>
         <div class="col-2">
            <input type="number" name="credit" min="0" class="credit form-control" :disabled="credit" v-model=transaction.credit>
        </div>
        <a v-if="last" @click="$emit('new-row')" class="btn btn-lg btn-info btn-circle text-right" role="button"><i class="fas fa-plus text-white"></i></a>
    </div>
</template>

<script>
export default {
    props: ['transaction', 'last', 'accounts'],
    computed: {
        credit () {
            return this.transaction.debit > 0 ? true : false;
        },
         debit () {
            return this.transaction.credit > 0 ? true : false;
        }
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

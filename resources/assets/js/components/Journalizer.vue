<template>
    <div id="journalizer" class="card">
        <h2 class="card-title">New Journal Entry</h2>
        <div class="card-body">
            <form @submit.prevent="_validate">
                <div class="row">
                    <div class="col-3">
                        <label>Account</label>
                    </div>
                    <div class="col-5">
                        <Label>Description</Label>
                    </div>
                    <div class="col-2">
                        <label>Credit</label>
                    </div>
                    <div class="col-2">
                        <label>Debit</label>
                    </div>
                </div>
                <journal-row v-for="(t, index) in transactions" 
                            v-bind:key="t.id" 
                            :transaction="t" 
                            :last="index +1 == transactions.length"
                            @new-row="_addRow"
                            :accounts="accounts"></journal-row>
                <div class="row">
                    <div class="col-8">
                      
                    </div>
                    <div class="col-2">
                        <input type="text" disabled v-model="credit_total" class="form-control" />
                    </div>
                    <div class="col-2">
                        <input type="text" disabled v-model="debit_total" class="form-control" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

</template>

<script>
import Transaction from '../transaction';
    export default {
        props: ['accounts'],
        data () {
            return {
                transactions: []
            }
        },
        mounted (){
            let t = new Transaction();
            this.transactions.push(new Transaction());
            this.transactions.push(new Transaction());
        },
        computed:{
            credit_total () {
               return _.sumBy(this.transactions, (transaction) => {
                   return transaction.credit === null ? 0 : parseInt(transaction.credit);
               });
            },
            debit_total () {
                return _.sumBy(this.transactions,  (transaction) => {
                   return transaction.debit === null ? 0 : parseInt(transaction.debit);
               });
            }
        },
        methods: {
            _validate(){
                if(this.debit_total !== this.credit_total){
                    alert("Your balance does not match. Plese check your entries");
                    return;
                }

                let count = _.filter(this.transactions, transaction => {
                    if((transaction.debit > 0 || transaction.credit > 0) && transaction.account_id === null) {
                        return true
                    }
                    return false;
                });

                if(count.length > 0){
                    alert('Please select an account!');
                    return;
                }

            },
            _addRow() {
                this.transactions.push(new Transaction());
            }
        }
    }
</script>

<style>

</style>
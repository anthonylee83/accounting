<template>
    <div id="journalizer" class="card">
        <h2 class="card-title">New Journal Entry</h2>
        <div class="card-body">
            <form @submit.prevent="_validate">
                <div class="row">
                    <div class="col-3">
                        <label>Account</label>
                    </div>
                    <div class="col-4">
                        <Label>Description</Label>
                    </div>
                    <div class="col-2">
                        <label>Debit</label>
                    </div>
                    <div class="col-2">
                        <label>Credit</label>
                    </div>
                    <div>
                        <label>Remove</label>
                    </div>
                </div>
                <journal-row v-for="(t, index) in transactions" 
                            v-bind:key="t.id" 
                            :transaction="t"
                            :first="index == 0" 
                            :last="index +1 == transactions.length"
                            @new-row="_addRow"
                            :accounts="accounts"
                            @delete-row="_deleteRow"
                            @amount-changed="changed"
                            ></journal-row>
                <div class="row">
                    <div class="col-8">
                      
                    </div>
                    <div class="col-2">
                        <input type="text" disabled v-model="debit_total" class="form-control" />
                    </div>
                    <div class="col-2">
                        <input type="text" disabled v-model="credit_total" class="form-control" />
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
                   return Number(transaction.credit) >= 0 ? Number(transaction.credit) : 0;
               });
            },
            debit_total () {
                return _.sumBy(this.transactions,  (transaction) => {
                   return Number(transaction.debit) >= 0? Number(transaction.debit) : 0;
               });
            },
        },
        methods: {
            _validate(){
                if(this.debit_total !== this.credit_total){
                    alert("Your balance does not match. Plese check your entries");
                    return;
                }

                if(this.debit_total == 0 || this.credit_total == 0){
                    alert("You cannot have a 0 balance amount!");
                    return;
                }
                let accounts = {};
                let count = _.filter(this.transactions, transaction => {
                    accounts[transaction.account_id] == undefined ? accounts[transaction.account_id] =1 : accounts[transaction.account_id]++;
                    if(transaction.account_id >0 ? false : true) {
                        return true
                    }
                    return false;
                });
                if(_.filter(accounts, account => {
                    return account > 1;
                }).length > 0){
                    
                  alert("You cannot use the same account twice!");  
                  return;
                }
                
                if(count.length > 0){
                    alert('Please select an account!');
                    return;
                }
                axios.post('/journal', { transactions: this.transactions})
                .then(response => {
                    window.location.href="/journal";
                });
            },
            _addRow() {
                this.transactions.push(new Transaction());
            },
            _deleteRow(event){
                _.remove(this.transactions, transaction => {
                    return transaction.key == event.key;
                });
                this.$forceUpdate();
            },
            orderTransactions (){
                return _.orderBy(this.transactions, [item => { return !parseFloat(item.debit) > 0 },
                    item => { return !parseFloat(item.credit) > 0}]);
            },
            changed () {
                this.transactions = this.orderTransactions();
            }
        }
    }
</script>

<style>

</style>
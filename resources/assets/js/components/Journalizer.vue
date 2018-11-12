<template>
    <div id="journalizer" class="card">
        <h2 class="card-title">New Journal Entry</h2>
        <div class="card-body mx-auto">
            <form @submit="_validate" method="POST" action="/journal" enctype="multipart/form-data">
                <slot></slot>
                <div class="row">
                    <div class="col-4">
                        <label>Account</label>
                    </div>
                    <div class="col-3">
                        <label>Debit</label>
                    </div>
                    <div class="col-3">
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
                         
                <input type="hidden" name="transactions" :value="JSON.stringify(transactions)" />

                <div class="row">
                    <div class="col-4">
                      
                    </div>
                    <div class="col-3">
                        <input type="text" disabled v-model="debit_total" class="form-control" />
                    </div>
                    <div class="col-3">
                        <input type="text" disabled v-model="credit_total" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label>Description</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="description" class="description form-control">
                    </div>
                </div>
                     <div class="row">
                    <div class="col-6">
                        <label>Attachments</label>
                    </div>
                    <div class="col-4">
                        <input type="file" multiple name="attachments[]" class="description form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="" class="btn btn-danger">Reset</a>
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
            _validate(evt){
                if(this.debit_total !== this.credit_total){
                    alert("Your balance does not match. Plese check your entries");
                    evt.preventDefault(); return false;
                }

                if(this.debit_total == 0 || this.credit_total == 0){
                    alert("You cannot have a 0 balance amount!");
                    evt.preventDefault(); return false;
                }

                
                let accounts = {};
                let count = _.filter(this.transactions, transaction => {
                    accounts[transaction.account_id] == undefined ? accounts[transaction.account_id] =1 : accounts[transaction.account_id]++;
                    if(transaction.account_id >0 ? false : true) {
                        return true
                    }
                });
                if(count.length > 0){
                    alert('Please select an account!');
                    evt.preventDefault(); return false;
                }
                if(_.filter(accounts, account => {
                    return account > 1;
                }).length > 0){
                    
                  alert("You cannot use the same account twice!");  
                  evt.preventDefault(); return false;
                }
                
  
                return true;
                /*
                axios.post('/journal', { transactions: this.transactions})
                .then(response => {
                    window.location.href="/journal";
                });
                */
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
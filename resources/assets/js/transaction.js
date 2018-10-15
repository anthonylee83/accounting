export default class Transaction{
    constructor(transaction){
        if(transaction !== undefined){
            this.id = transaction.id;
            this.account_id = transaction.account_id;
            this.description = transaction.description;
            this.credit = transaction.credit;
            this.debit = transaction.debit;

        }else{
            this.id= null,
            this.account_id= null,
            this.description= null,
            this.credit= null,
            this.debit= null
        }

            
    }
}
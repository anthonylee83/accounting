<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Journal Entry 1
        Transaction::create([
            'journal_entry_id'          => '1',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '10000'
        ]);

        Transaction::create([
            'journal_entry_id'          => '1',
            'account_id'                => '2',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '1500'
        ]);

        Transaction::create([
            'journal_entry_id'          => '1',
            'account_id'                => '4',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '1250'
        ]);

        Transaction::create([
            'journal_entry_id'          => '1',
            'account_id'                => '5',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '7500'
        ]);

        Transaction::create([
            'journal_entry_id'          => '1',
            'account_id'                => '13',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '20250'
        ]);

        //Journal Entry 2
        Transaction::create([
            'journal_entry_id'          => '2',
            'account_id'                => '3',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '4500'
        ]);

        Transaction::create([
            'journal_entry_id'          => '2',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '4500'
        ]);

        //Journal Entry 3
        Transaction::create([
            'journal_entry_id'          => '3',
            'account_id'                => '6',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '1800'
        ]);

        Transaction::create([
            'journal_entry_id'          => '3',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '1800'
        ]);

        //Journal Entry 4
        Transaction::create([
            'journal_entry_id'          => '4',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '3000'
        ]);

        Transaction::create([
            'journal_entry_id'          => '4',
            'account_id'                => '10',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '3000'
        ]);

        //Journal Entry 5
        Transaction::create([
            'journal_entry_id'          => '5',
            'account_id'                => '5',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '1800'
        ]);

        Transaction::create([
            'journal_entry_id'          => '5',
            'account_id'                => '8',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '1800'
        ]);

        //Journal Entry 6
        Transaction::create([
            'journal_entry_id'          => '6',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '800'
        ]);

        Transaction::create([
            'journal_entry_id'          => '6',
            'account_id'                => '2',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '800'
        ]);

        //Journal Entry 7
        Transaction::create([
            'journal_entry_id'          => '7',
            'account_id'                => '22',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '120'
        ]);

        Transaction::create([
            'journal_entry_id'          => '7',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '120'
        ]);

        //Journal Entry 8
        Transaction::create([
            'journal_entry_id'          => '8',
            'account_id'                => '8',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '800'
        ]);

        Transaction::create([
            'journal_entry_id'          => '8',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '800'
        ]);

        //Journal Entry 9
        Transaction::create([
            'journal_entry_id'          => '9',
            'account_id'                => '2',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '2250'
        ]);

        Transaction::create([
            'journal_entry_id'          => '9',
            'account_id'                => '14',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '2250'
        ]);

        //Journal Entry 10
        Transaction::create([
            'journal_entry_id'          => '10',
            'account_id'                => '19',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '400'
        ]);

        Transaction::create([
            'journal_entry_id'          => '10',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '400'
        ]);

        //Journal Entry 11
        Transaction::create([
            'journal_entry_id'          => '11',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '3175'
        ]);

        Transaction::create([
            'journal_entry_id'          => '10',
            'account_id'                => '14',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '3175'
        ]);

        //Journal Entry 12
        Transaction::create([
            'journal_entry_id'          => '12',
            'account_id'                => '4',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '750'
        ]);

        Transaction::create([
            'journal_entry_id'          => '12',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '750'
        ]);

        //Journal Entry 13
        Transaction::create([
            'journal_entry_id'          => '13',
            'account_id'                => '2',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '1100'
        ]);

        Transaction::create([
            'journal_entry_id'          => '13',
            'account_id'                => '14',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '1100'
        ]);

        //Journal Entry 14
        Transaction::create([
            'journal_entry_id'          => '14',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '1850'
        ]);

        Transaction::create([
            'journal_entry_id'          => '14',
            'account_id'                => '14',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '1850'
        ]);

        //Journal Entry 15
        Transaction::create([
            'journal_entry_id'          => '15',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '1600'
        ]);

        Transaction::create([
            'journal_entry_id'          => '15',
            'account_id'                => '2',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '1600'
        ]);

        //Journal Entry 16
        Transaction::create([
            'journal_entry_id'          => '16',
            'account_id'                => '19',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '400'
        ]);

        Transaction::create([
            'journal_entry_id'          => '16',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '400'
        ]);

        //Journal Entry 17
        Transaction::create([
            'journal_entry_id'          => '17',
            'account_id'                => '20',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '130'
        ]);

        Transaction::create([
            'journal_entry_id'          => '17',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '130'
        ]);

        //Journal Entry 18
        Transaction::create([
            'journal_entry_id'          => '18',
            'account_id'                => '21',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '200'
        ]);

        Transaction::create([
            'journal_entry_id'          => '18',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '200'
        ]);

        //Journal Entry 19
        Transaction::create([
            'journal_entry_id'          => '19',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '2050'
        ]);

        Transaction::create([
            'journal_entry_id'          => '19',
            'account_id'                => '14',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '2050'
        ]);

        //Journal Entry 20
        Transaction::create([
            'journal_entry_id'          => '20',
            'account_id'                => '2',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '1000'
        ]);

        Transaction::create([
            'journal_entry_id'          => '20',
            'account_id'                => '14',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '1000'
        ]);

        //Journal Entry 21
        Transaction::create([
            'journal_entry_id'          => '21',
            'account_id'                => '19',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '4500'
        ]);

        Transaction::create([
            'journal_entry_id'          => '21',
            'account_id'                => '1',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '4500'
        ]);

        //Adjusted Entry 1
        Transaction::create([
            'journal_entry_id'          => '22',
            'account_id'                => '23',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '150'
        ]);

        Transaction::create([
            'journal_entry_id'          => '22',
            'account_id'                => '6',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '150'
        ]);

        //Adjusted Entry 2
        Transaction::create([
            'journal_entry_id'          => '23',
            'account_id'                => '18',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '980'
        ]);

        Transaction::create([
            'journal_entry_id'          => '23',
            'account_id'                => '4',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '980'
        ]);

        //Adjusted Entry 3
        Transaction::create([
            'journal_entry_id'          => '24',
            'account_id'                => '16',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '500'
        ]);

        Transaction::create([
            'journal_entry_id'          => '24',
            'account_id'                => '7',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '500'
        ]);

        //Adjusted Entry 4
        Transaction::create([
            'journal_entry_id'          => '25',
            'account_id'                => '19',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '20'
        ]);

        Transaction::create([
            'journal_entry_id'          => '25',
            'account_id'                => '9',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '20'
        ]);

        //Adjusted Entry 5
        Transaction::create([
            'journal_entry_id'          => '26',
            'account_id'                => '17',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '1500'
        ]);

        Transaction::create([
            'journal_entry_id'          => '26',
            'account_id'                => '3',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '1500'
        ]);

        //Adjusted Entry 6
        Transaction::create([
            'journal_entry_id'          => '27',
            'account_id'                => '10',
            'description'               => '',
            'debit'                     => '1',
            'amount'                    => '2000'
        ]);

        Transaction::create([
            'journal_entry_id'          => '27',
            'account_id'                => '14',
            'description'               => '',
            'debit'                     => '0',
            'amount'                    => '2000'
        ]);
    }
}

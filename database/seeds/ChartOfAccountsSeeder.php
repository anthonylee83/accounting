<?php

use Illuminate\Database\Seeder;
use App\Account;

class ChartOfAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AssetsID       = DB::table('account_types')->where('account_type', 'Assets')->value('id');
        $EquityID       = DB::table('account_types')->where('account_type', 'Equity')->value('id');
        $ExpensesID     = DB::table('account_types')->where('account_type', 'Expenses')->value('id');
        $LiabilitiesID  = DB::table('account_types')->where('account_type', 'Liabilities')->value('id');
        $RevenuesID     = DB::table('account_types')->where('account_type', 'Revenues')->value('id');
        $ContraAssetsID = DB::table('account_types')->where('account_type', 'Contra Assets')->value('id');

        $LongtermID  = DB::table('account_subtypes')->where('sub_type', 'Long term')->value('id');
        $ShorttermID = DB::table('account_subtypes')->where('sub_type', 'Short term')->value('id');

        Account::create(
        [
            'account_name'        => 'Cash',
            'account_type_id'     => $AssetsID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Accounts Recievable',
            'account_type_id'     => $AssetsID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Prepaid Rent',
            'account_type_id'     => $AssetsID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Supplies',
            'account_type_id'     => $AssetsID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Office Equipment',
            'account_type_id'     => $AssetsID,
            'account_subtype_id'  => $LongtermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Prepaid Insurance',
            'account_type_id'     => $AssetsID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Accumulated Depreciation, Equipment',
            'account_type_id'     => $ContraAssetsID,
            'account_subtype_id'  => $LongtermID,
            'account_normal_side' => 'Credit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Accounts Payable',
            'account_type_id'     => $LiabilitiesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Credit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Salaries Payable',
            'account_type_id'     => $LiabilitiesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Credit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Unearned Revenue',
            'account_type_id'     => $LiabilitiesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Credit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Retained Earnings',
            'account_type_id'     => $LiabilitiesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Credit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Dividends Declared',
            'account_type_id'     => $LiabilitiesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Credit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Contributed Capital',
            'account_type_id'     => $EquityID,
            'account_subtype_id'  => $LongtermID,
            'account_normal_side' => 'Credit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Service Revenue',
            'account_type_id'     => $RevenuesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Credit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Income Expense',
            'account_type_id'     => $ExpensesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Depreciation Expense',
            'account_type_id'     => $ExpensesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Rent Expense',
            'account_type_id'     => $ExpensesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Supplies Expense',
            'account_type_id'     => $ExpensesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Salaries Expense',
            'account_type_id'     => $ExpensesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Telephone Expense',
            'account_type_id'     => $ExpensesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Utilities Expense',
            'account_type_id'     => $ExpensesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
        Account::create(
        [
            'account_name'        => 'Advertising Expense',
            'account_type_id'     => $ExpensesID,
            'account_subtype_id'  => $ShorttermID,
            'account_normal_side' => 'Debit',
            'account_balance'     => '0'
        ]
        );
    }
}

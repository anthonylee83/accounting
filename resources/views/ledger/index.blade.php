@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <search
            display_field="account_name"
            search_url="/accounts/search/"
            link_url="/accounts/"></search>
        <h1>Chart of Accounts</h1>
        <table class="table table-striped">
            <thead>
            <th>Acct #</th>
            <th>Name</th>
            <th>Account Type</th>
            <th>Sub Type</th>
            <th>Normal Side</th>
            <th>Balance</th>
            </thead>

            <tbody>
            @forelse($accounts as $account)
                <td>{{$account->id}}</td>
                <td align="left">
                    <a href="{{action('LedgerController@showTransactions', $account->id)}}">
                        {{$account->account_name}}
                    </a>
                </td>
                <td>{{$account->accountType->account_type}}</td>
                <td>{{$account->accountSubtype->sub_type}}</td>
                <td>{{$account->accountNormalSide->normal_side}}</td>
                @php($accountBalance = preg_replace("/[^0-9.]/", "", "$account->account_balance"))
                <td align="right">$<?php echo number_format($accountBalance,2,'.',','); ?></td>
                </tr>
            @empty
                <tr>
                    <td colspan=5>
                        There are no accounts.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div clas="paginate">
            {{$accounts->render()}}
        </div>

    </div>

@endsection

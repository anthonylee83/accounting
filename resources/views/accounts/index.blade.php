@extends('layouts.app')



@section('content')


<div class='col-xs-12 col-md-8 mx-auto'>
    <search
        display_field="account_name"
        search_url="/accounts/search/"
        link_url="/accounts/"></search>
    <h1>Chart of Accounts</h1>
        <dropdown-navigation
            path="{{$path}}"
            all_path="/accounts/all"
            base_path="/accounts"
            model="Accounts"></dropdown-navigation>
    <div class="text-right -mb-4">
            <a dusk="newUser" href="{{action('Accounts\ChartOfAccounts@newAccount')}}" class="btn btn-lg btn-info btn-circle text-right" role="button"><i class="fas fa-plus text-white"></i></a>
        </div>
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
                    <a href="{{action('Accounts\ChartOfAccounts@showAccount', $account->id)}}">
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
                        <a href="{{action('Accounts\ChartOfAccounts@newAccount')}}">
                        Create a new account</a>
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

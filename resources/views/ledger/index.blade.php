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
                <td>
                    <a href="{{action('LedgerController@showTransactions', $account->id)}}">
                        {{$account->account_name}}
                    </a>
                </td>
                <td>{{$account->accountType->account_type}}</td>
                <td>{{$account->accountSubtype->sub_type}}</td>
                <td>{{$account->accountNormalSide->normal_side}}</td>
                <td>{{$account->account_balance}}</td>
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

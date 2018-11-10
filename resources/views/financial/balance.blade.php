@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h1>Trivial Accounting</h1>
        <h1>Balance Sheet</h1>
        <h2>as of <?php echo date("m/d/y")?></h2>
        <table class="table table-striped">
            <thread>
                <th></th>
                <th></th>
                <th></th>
                <th>Totals</th>
            </thread>
            <tr>
                <td><b><u>Assets</u></b></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td>
                <td><b>Current Assets</b></td>
                <td></td>
                <td><b>$<?php echo $currentAssetsTotal; ?></b></td>
            </tr>
            <tr>
                @forelse($currentAssets as $account)
                    <td></td>
                    <td>{{$account->account_name}}</td>
                    <td>{{$account->account_balance}}</td>
                    <td></td>
            </tr>
                @empty
                    <tr>
                        <td colspan=4>
                            There are no Current Asset Accounts.
                        </td>
                    </tr>
                @endforelse
            <tr>
                <td></td>
                <td><b>Non-Current Assets</b></td>
                <td></td>
                <td><b>$<?php echo $nonCurrentAssetsTotal; ?></b></td>
            </tr>
            <tr>
                @forelse($nonCurrentAssets as $account)
                    <td></td>
                    <td>{{$account->account_name}}</td>
                    <td>{{$account->account_balance}}</td>
                    <td></td>
            </tr>
                @empty
                    <tr>
                        <td colspan=4>
                            There are no Non-Current Asset Accounts.
                        </td>
                    </tr>
                @endforelse
            <tr>
                <td></td>
                <td><b>Total Assets</b></td>
                <td></td>
                <td><b>$<?php echo $assetsTotal; ?></b></td>
            </tr>
            <tr>
                <td><b><u>Equity and Liabilities</u></b></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td>
                <td><b>Owner's Equity</b></td>
                <td></td>
                <td><b>$<?php echo $equityTotal; ?></b></td>
            </tr>
            <tr>
                @forelse($equities as $account)
                    <td></td>
                    <td>{{$account->account_name}}</td>
                    <td>{{$account->account_balance}}</td>
                    <td></td>
            </tr>
            @empty
                <tr>
                    <td colspan=4>
                        There are no Equity Accounts.
                    </td>
                </tr>
            @endforelse
            <tr>
                <td></td>
                <td><b>Current Liabilities</b></td>
                <td></td>
                <td><b>$<?php echo $currentLiabilitiesTotal; ?></b></td>
            </tr>
            <tr>
                @forelse($currentLiabilities as $account)
                    <td></td>
                    <td>{{$account->account_name}}</td>
                    <td>{{$account->account_balance}}</td>
                    <td></td>
            </tr>
            @empty
                <tr>
                    <td colspan=4>
                        There are no Current Liability Accounts.
                    </td>
                </tr>
            @endforelse
            <tr>
                <td></td>
                <td><b>Non-Current Liabilities</b></td>
                <td></td>
                <td><b>$<?php echo $nonCurrentLiabilitiesTotal; ?></b></td>
            </tr>
            <tr>
                @forelse($nonCurrentLiabilities as $account)
                    <td></td>
                    <td>{{$account->account_name}}</td>
                    <td>{{$account->account_balance}}</td>
                    <td></td>
            </tr>
            @empty
                <tr>
                    <td colspan=4>
                        There are no Non-Current Liability Accounts.
                    </td>
                </tr>
            @endforelse
            <tr>
                <td></td>
                <td><b>Total Equity and Liabilities</b></td>
                <td></td>
                <td><b>$<?php echo $equityLiabilitiesTotal; ?></b></td>
            </tr>
        </table>
    </div>

@endsection

@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h1>Trivial Accounting</h1>
        <h1>Balance Sheet</h1>
        <h2>as of <?php echo date("m/d/y")?></h2>
        <table class="table table-striped">
            <tr>
                <td ALIGN="LEFT"><b><u>Assets</u></b></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td id="SingLn" ALIGN="LEFT">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Current Assets</b>
                    </span>
                </td>
                <td></td>
                <td></td>
                <td ALIGN="RIGHT"><b>$<?php echo $currentAssetsTotal; ?>.00</b></td>
            </tr>
            <tr>
                @forelse($currentAssets as $account)
                    @php
                    $accountBalance = preg_replace("/[^0-9.]/", "", "$account->account_balance");
                    @endphp
                    @if($accountBalance > 0)
                        <td ALIGN="LEFT">
                            <span style = "float: left; position: relative; left: 40px">
                            {{$account->account_name}}
                            </span>
                        </td>
                        <td></td>
                        <td ALIGN="RIGHT">{{$account->account_balance}}</td>
                        <td></td>
                    @endif
            </tr>
                @empty
                    <tr>
                        <td colspan=4>
                            There are no Current Asset Accounts.
                        </td>
                    </tr>
                @endforelse
            <tr>
                <td id="SingLn" ALIGN="LEFT">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Long Term Assets</b>
                    </span>
                </td>
                <td></td>
                <td></td>
                <td ALIGN="RIGHT"><b>$<?php echo $nonCurrentAssetsTotal; ?>.00</b></td>
            </tr>
            <tr>
                @forelse($nonCurrentAssets as $account)
                    @php
                        $accountBalance = preg_replace("/[^0-9.]/", "", "$account->account_balance");
                    @endphp
                    @if($accountBalance > 0)
                        <td ALIGN="LEFT">
                            <span style = "float: left; position: relative; left: 40px">
                            {{$account->account_name}}
                            </span>
                        </td>
                        <td></td>
                        <td ALIGN="RIGHT">{{$account->account_balance}}</td>
                        <td></td>
                    @endif
            </tr>
                @empty
                    <tr>
                        <td colspan=4>
                            There are no Long Term Asset Accounts.
                        </td>
                    </tr>
                @endforelse
            <tr>
                <td ALIGN="LEFT">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Total Assets</b>
                    </span>
                </td>
                <td></td>
                <td></td>
                <td id="SingLn" ALIGN="RIGHT"><b>$<?php echo $assetsTotal; ?>.00</b></td>
            </tr>

            <tr>
                <td ALIGN="LEFT"><b><u>Liabilities and Equity</u></b></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td id="SingLn" ALIGN="LEFT">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Current Liabilities</b>
                    </span>
                </td>
                <td></td>
                <td></td>
                <td ALIGN="RIGHT"><b>$<?php echo $currentLiabilitiesTotal; ?>.00</b></td>
            </tr>
            <tr>
                @forelse($currentLiabilities as $account)
                    @php
                        $accountBalance = preg_replace("/[^0-9.]/", "", "$account->account_balance");
                    @endphp
                    @if($accountBalance > 0)
                        <td ALIGN="LEFT">
                            <span style = "float: left; position: relative; left: 40px">
                            {{$account->account_name}}
                            </span>
                        </td>
                        <td></td>
                        <td ALIGN="RIGHT">{{$account->account_balance}}</td>
                        <td></td>
                    @endif
            </tr>
            @empty
                <tr>
                    <td colspan=4>
                        There are no Current Liability Accounts.
                    </td>
                </tr>
            @endforelse
            <tr>
                <td id="SingLn" ALIGN="LEFT">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Long Term Liabilities</b>
                    </span>
                </td>
                <td></td>
                <td></td>
                <td ALIGN="RIGHT"><b>$<?php echo $nonCurrentLiabilitiesTotal; ?>.00</b></td>
            </tr>
            <tr>
                @forelse($nonCurrentLiabilities as $account)
                    @php
                        $accountBalance = preg_replace("/[^0-9.]/", "", "$account->account_balance");
                    @endphp
                    @if($accountBalance > 0)
                        <td ALIGN="LEFT">
                            <span style = "float: left; position: relative; left: 40px">
                            {{$account->account_name}}
                            </span>
                        </td>
                        <td></td>
                        <td ALIGN="RIGHT">{{$account->account_balance}}</td>
                        <td></td>
                    @endif
            </tr>
            @empty
                <tr>
                    <td colspan=4>
                        There are no Long Term Liability Accounts.
                    </td>
                </tr>
            @endforelse
            <tr>
                <td id="SingLn" ALIGN="LEFT">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Equity</b>
                    </span>
                </td>
                <td></td>
                <td></td>
                <td ALIGN="RIGHT"><b>$<?php echo $equityTotal; ?>.00</b></td>
            </tr>
            <tr>
                @forelse($equities as $account)
                    @php
                        $accountBalance = preg_replace("/[^0-9.]/", "", "$account->account_balance");
                    @endphp
                    @if($accountBalance > 0)
                        <td ALIGN="LEFT">
                            <span style = "float: left; position: relative; left: 40px">
                            {{$account->account_name}}
                            </span>
                        </td>
                        <td></td>
                        <td ALIGN="RIGHT">{{$account->account_balance}}</td>
                        <td></td>
                    @endif
            </tr>
            @empty
                <tr>
                    <td colspan=4>
                        There are no Equity Accounts.
                    </td>
                </tr>
            @endforelse
            <tr>
                <td ALIGN="LEFT">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Total Equity and Liabilities</b>
                    </span>
                </td>
                <td></td>
                <td></td>
                <td id="SingLn" ALIGN="RIGHT"><b>$<?php echo $equityLiabilitiesTotal; ?>.00</b></td>
            </tr>
        </table>
    </div>

@endsection

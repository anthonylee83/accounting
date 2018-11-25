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
                <td id="SingLn" ALIGN="RIGHT"><b>$<?php echo number_format($currentAssetsTotal,2,'.',','); ?></b></td>
            </tr>
            <tr>
                @php
                    $counter = 0;
                @endphp
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
                        @if($counter == 0)
                            <td></td>
                            <td ALIGN="RIGHT">$<?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                            @php
                            $counter += 1;
                            @endphp
                        @elseif($counter > 0)
                            <td></td>
                            <td ALIGN="RIGHT"><?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                        @endif
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
                <td id="SingLn" ALIGN="RIGHT"><b>$<?php echo number_format($nonCurrentAssetsTotal,2,'.',','); ?></b></td>
            </tr>
            <tr>
                @php
                $counter = 0;
                @endphp
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
                        @if($counter == 0)
                            <td></td>
                            <td ALIGN="RIGHT">$<?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                            @php
                                $counter += 1;
                            @endphp
                        @elseif($counter > 0)
                            <td></td>
                            <td ALIGN="RIGHT"><?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                        @endif
                    @endif
            </tr>
                @empty
                    <tr>
                        <td colspan=4>
                            There are no Long Term Asset Accounts.
                        </td>
                    </tr>
                @endforelse
                @forelse($contraAssets as $account)
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
                        <td ALIGN="RIGHT">(<?php echo number_format($accountBalance,2,'.',','); ?>)</td>
                        <td></td>
                    @endif
                @empty
                @endforelse
            <tr>
                <td ALIGN="LEFT" style = "border-top: 1px solid; border-bottom: 1px solid">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Total Assets</b>
                    </span>
                </td>
                <td style = "border-top: 1px solid; border-bottom: 1px solid"></td>
                <td style = "border-top: 1px solid; border-bottom: 1px solid"></td>
                <td id="totalDr" ALIGN="RIGHT" style = "border-top: 1px solid; border-bottom: 1px solid"><b>$<?php echo number_format($assetsTotal,2,'.',','); ?></b></td>
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
                <td id="SingLn" ALIGN="RIGHT"><b>$<?php echo number_format($currentLiabilitiesTotal,2,'.',','); ?></b></td>
            </tr>
            <tr>
                @php
                    $counter = 0;
                @endphp
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
                        @if($counter == 0)
                            <td></td>
                            <td ALIGN="RIGHT">$<?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                            @php
                                $counter += 1;
                            @endphp
                        @elseif($counter > 0)
                            <td></td>
                            <td ALIGN="RIGHT"><?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                        @endif
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
            @if($nonCurrentLiabilitiesTotal > 0)
                <td id="SingLn" ALIGN="LEFT">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Long Term Liabilities</b>
                    </span>
                </td>
                <td></td>
                <td></td>
                <td id="SingLn" ALIGN="RIGHT"><b>$<?php echo number_format($nonCurrentLiabilitiesTotal,2,'.',','); ?></b></td>
            </tr>
            <tr>
                @php
                    $counter = 0;
                @endphp
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
                        @if($counter == 0)
                            <td></td>
                            <td ALIGN="RIGHT">$<?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                            @php
                                $counter += 1;
                            @endphp
                        @elseif($counter > 0)
                            <td></td>
                            <td ALIGN="RIGHT"><?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                        @endif
                    @endif
            </tr>
            @empty
                <tr>
                    <td colspan=4>
                        There are no Long Term Liability Accounts.
                    </td>
                </tr>
            @endforelse
            @endif
            <tr>
                <td id="SingLn" ALIGN="LEFT">
                    <span style = "float: left; position: relative; left: 20px">
                        <b>Equity</b>
                    </span>
                </td>
                <td></td>
                <td></td>
                <td id="SingLn" ALIGN="RIGHT"><b>$<?php echo number_format($equityTotal,2,'.',','); ?></b></td>
            </tr>
            <tr>
                @php
                    $counter = 0;
                @endphp
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
                        @if($counter == 0)
                            <td></td>
                            <td ALIGN="RIGHT">$<?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                            @php
                                $counter += 1;
                            @endphp
                        @elseif($counter > 0)
                            <td></td>
                            <td ALIGN="RIGHT"><?php echo number_format($accountBalance,2,'.',','); ?></td>
                            <td></td>
                        @endif
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
                            <span style = "float: left; position: relative; left: 40px">
                            Retained Earnings
                            </span>
            </td>
            <td></td>
            <td ALIGN="RIGHT"><?php echo number_format($retainedEarningsValue,2,'.',','); ?></td>
            <td></td>
            </tr>
            <tr>
                <td ALIGN="LEFT" style = "border-top: 1px solid; border-bottom: 1px solid">
                    <span style = "float: left; position: relative; left: 20px ">
                        <b>Total Equity and Liabilities</b>
                    </span>
                </td>
                <td style = "border-top: 1px solid; border-bottom: 1px solid"></td>
                <td style = "border-top: 1px solid; border-bottom: 1px solid"></td>
                <td id="totalDr" ALIGN="RIGHT" style = "border-top: 1px solid; border-bottom: 1px solid"><b>$<?php echo number_format($equityLiabilitiesTotal,2,'.',','); ?></b></td>
            </tr>
        </table>
    </div>

@endsection

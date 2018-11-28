@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h2 style = "line-height: 80%">Trivial Accounting</h2>
        <h2 style = "line-height: 80%">Closing Trial Balance</h2>
        <h3 style = "line-height: 80%">as of <?php echo date("m/d/y")?></h3>
        <table class="table table-striped">
            <thread>
                <th>Account</th>
                <th>Debit</th>
                <th>Credit</th>
            </thread>

            <tr>
                @php
                    $debitTotal = 0.00;
                    $creditTotal = 0.00;
                    $debitDollarSign = 0;
                    $creditDollarSign = 0;
                @endphp
                @forelse($accounts as $account)
                    @if($account->account_type_id == 1 ||$account->account_type_id == 6 || $account->account_type_id == 4
                        || $account->account_type_id == 2)
                    @php
                        $accountBalance = preg_replace("/[^0-9.]/", "", "$account->account_balance");
                    @endphp
                    @if($accountBalance > 0)
                        <td ALIGN="LEFT">{{$account->account_name}}</td>
                        @if($account->account_normal_side_id == 1)
                            @if($debitDollarSign == 0)
                                <td ALIGN="RIGHT">$<?php echo number_format($accountBalance,2,'.',','); ?></td>
                                <td> </td>
                            @elseif($debitDollarSign > 0)
                                <td ALIGN="RIGHT"><?php echo number_format($accountBalance,2,'.',','); ?></td>
                                <td> </td>
                            @endif
                            @php
                                $debitTotal += $accountBalance;
                                $debitDollarSign += 1;
                                $creditDollarSign = 0;
                            @endphp
                        @elseif($account->account_normal_side_id == 2)
                            @if($creditDollarSign == 0)
                                <td> </td>
                                <td ALIGN="RIGHT">$<?php echo number_format($accountBalance,2,'.',','); ?></td>
                            @elseif($creditDollarSign > 0)
                                <td> </td>
                                <td ALIGN="RIGHT"><?php echo number_format($accountBalance,2,'.',','); ?></td>
                            @endif
                            @php
                                $creditTotal += $accountBalance;
                                $creditDollarSign += 1;
                                $debitDollarSign = 0;
                            @endphp
                        @endif
                    @endif
                    @endif
            </tr>
            @empty
                <tr>
                    <td colspan=5>
                        There are no accounts.
                    </td>
                </tr>
            @endforelse
            <tr>
                <td ALIGN="LEFT">Retained Earnings</td>
                <td> </td>
                <td ALIGN="RIGHT"><?php echo number_format($retainedEarningsValue,2,'.',','); ?></td>
            </tr>
            @php
            $creditTotal += $retainedEarningsValue;
            @endphp
            <tr>
                <td><b>Total Balances</b></td>
                <td id="totalDr" ALIGN="RIGHT"><b>$<?php echo number_format($debitTotal,2,'.',','); ?></b></td>
                <td id="totalCr" ALIGN="RIGHT"><b>$<?php echo number_format($creditTotal,2,'.',','); ?></b></td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

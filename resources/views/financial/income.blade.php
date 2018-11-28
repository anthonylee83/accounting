@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h2 style = "line-height: 80%">Trivial Accounting</h2>
        <h2 style = "line-height: 80%">Income Statement</h2>
        <h3 style = "line-height: 80%">For the period ending <?php echo date("m/d/y")?></h3>
        <table class="table table-striped">
            <tr>
                <td ALIGN="LEFT"><b>Revenue</b></td><td></td><td></td><td></td>
            </tr>
            <tr>
                @php
                    $counter = 0;
                @endphp
                @forelse($revenues as $revenue)
                    @php
                    $accountBalance = preg_replace("/[^0-9.]/", "", "$revenue->account_balance");
                    @endphp
                    @if($accountBalance > 0)
                        <td ALIGN="LEFT">
                            <span style = "float: left; position: relative; left: 40px">
                            {{$revenue->account_name}}
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
                        There are no Revenue Accounts.
                       </td>
                    </tr>
                @endforelse
            <tr>
                <td ALIGN="LEFT"><b>Total Revenue</b></td>
                <td></td>
                <td></td>
                <td id="SingLn" ALIGN="RIGHT" style="text-decoration: underline overline;"><b>$<?php echo number_format($revenueTotal,2,'.',','); ?></b></td>
            </tr>
            <tr>
                <td ALIGN="LEFT"><b>Expenses</b></td><td></td><td></td><td></td>
            </tr>
            <tr>
                @php
                    $counter = 0;
                @endphp
                @forelse($expenses as $expense)
                    @php
                        $accountBalance = preg_replace("/[^0-9.]/", "", "$expense->account_balance");
                    @endphp
                    @if($accountBalance > 0)
                        <td ALIGN="LEFT">
                            <span style = "float: left; position: relative; left: 40px">
                            {{$expense->account_name}}
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
                            There are no Expense Accounts.
                        </td>
                    </tr>
                @endforelse
                <tr>
                    <td ALIGN="LEFT"><b>Total Expenses</b></td>
                    <td></td>
                    <td></td>
                    <td id="SingLn" ALIGN="RIGHT" style="text-decoration: underline overline;"><b>$<?php echo number_format($expenseTotal,2,'.',','); ?></b></td>
                </tr>
            <tr>
                <td ALIGN="LEFT" style="border-top: 1px solid"><b>Net Income (Loss)</b></td>
                <td style="border-top: 1px solid"></td>
                <td style="border-top: 1px solid"></td>
                <td id="totalDr" ALIGN="RIGHT" style="border-top: 1px solid"><b>$<?php echo number_format($netIncome,2,'.',','); ?></b></td>
            </tr>



        </table>
    </div>

@endsection

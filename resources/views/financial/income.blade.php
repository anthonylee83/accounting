@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h1>Trivial Accounting</h1>
        <h1>Income Statement</h1>
        <h2>For the period ending <?php echo date("m/d/y")?></h2>
        <table class="table table-striped">
            <tr>
                <td ALIGN="LEFT"><b>Revenue</b></td><td></td><td></td><td></td>
            </tr>
            <tr>
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
                        <td></td>
                        <td ALIGN="RIGHT">{{$revenue->account_balance}}</td>
                        <td></td>
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
                <td id="SingLn" ALIGN="RIGHT"><b>$<?php echo $revenueTotal; ?>.00</b></td>
            </tr>
            <tr>
                <td ALIGN="LEFT"><b>Expenses</b></td><td></td><td></td><td></td>
            </tr>
            <tr>
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
                        <td></td>
                        <td ALIGN="RIGHT">{{$expense->account_balance}}</td>
                        <td></td>
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
                    <td id="SingLn" ALIGN="RIGHT"><b>$<?php echo $expenseTotal; ?>.00</b></td>
                </tr>
            <tr>
                <td ALIGN="LEFT"><b>Net Income (Loss)</b></td>
                <td></td>
                <td></td>
                <td id="totalDr" ALIGN="RIGHT"><b>$<?php echo $netIncome; ?>.00</b></td>
            </tr>



        </table>
    </div>

@endsection

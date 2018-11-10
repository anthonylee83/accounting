@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h1>Trivial Accounting</h1>
        <h1>Income Statement</h1>
        <h2>For <?php echo date("m/d/y")?></h2>
        <table class="table table-striped">
            <thread>
                <th></th>
                <th></th>
                <th></th>
                <th>Totals</th>
            </thread>
            @php
            $revenueTotal = 0;
            @endphp
            <tr>
                <td><b>Revenue</b></td><td></td><td></td><td></td>
            </tr>
            <tr>
                @forelse($revenues as $revenue)
                    <td></td>
                    <td>{{$revenue->account_name}}</td>
                    <td>{{$revenue->account_balance}}</td>
                    <td></td>
                    @php
                    $revenueTotal += preg_replace("/[^0-9.]/", "", "$revenue->account_balance");
                    @endphp
            </tr>
                @empty
                    <tr>
                       <td colspan=5>
                        There are no Revenue Accounts.
                       </td>
                    </tr>
                @endforelse
            <tr>
                <td></td>
                <td><b>Total Revenue</b></td>
                <td></td>
                <td><b>$<?php echo $revenueTotal; ?></b></td>
            </tr>
            @php
                $expenseTotal = 0;
            @endphp
            <tr>
                <td><b>Expenses</b></td><td></td><td></td><td></td>
            </tr>
            <tr>
                @forelse($expenses as $expense)
                    <td></td>
                    <td>{{$expense->account_name}}</td>
                    <td>{{$expense->account_balance}}</td>
                    <td></td>
                    @php
                        $expenseTotal += preg_replace("/[^0-9.]/", "", "$expense->account_balance");
                    @endphp
            </tr>
                @empty
                    <tr>
                        <td colspan=5>
                            There are no Expense Accounts.
                        </td>
                    </tr>
                @endforelse
                <tr>
                    <td></td>
                    <td><b>Total Expenses</b></td>
                    <td></td>
                    <td><b>$<?php echo $expenseTotal; ?></b></td>
                </tr>
            @php
                $netIncome = $revenueTotal - $expenseTotal;
            @endphp
            <tr>
                <td><b>Net Income</b></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td>
                <td><b>Net Income</b></td>
                <td></td>
                <td><b>$<?php echo $netIncome; ?></b></td>
            </tr>


        </table>
    </div>

@endsection

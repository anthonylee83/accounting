@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h1>Trivial Accounting</h1>
        <h1>Statement of Retained Earnings</h1>
        <h2>For <?php echo date("m/d/y")?></h2>
        <table class="table table-striped">
            <thread>
                <th></th>
                <th>Total Amount</th>
            </thread>
            <tr>
                <td ALIGN="LEFT">Beginning Retained Earnings</td>
                <td ALIGN="RIGHT"><b>$<?php echo $retainedEarningsValue; ?></b></td>
            </tr>
            <tr>
                <td ALIGN="LEFT">Net Income</td>
                <td ALIGN="RIGHT"><b>$<?php echo $netIncome; ?>.00</b></td>
            </tr>
            <tr>
                <td ALIGN="LEFT">Dividends Declared</td>
                <td ALIGN="RIGHT"><b>$<?php echo $dividendsDeclaredValue; ?></b></td>
            </tr>
            <tr>
                <td ALIGN="LEFT">Ending Retained Earnings</td>
                <td ALIGN="RIGHT"><b>$<?php echo $newRetainedEarningsValue; ?>.00</b></td>
            </tr>
        </table>
    </div>

@endsection

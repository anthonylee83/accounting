@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h2 style = "line-height: 80%">Trivial Accounting</h2>
        <h2 style = "line-height: 80%">Statement of Retained Earnings</h2>
        <h3 style = "line-height: 80%">For the period ending <?php echo date("m/d/y")?></h3>
        <table class="table table-striped">
            <tr>
                <td ALIGN="LEFT">Beginning Retained Earnings</td>
                <td ALIGN="RIGHT"><b>$<?php echo number_format($retainedEarningsValue,2,'.',','); ?></b></td>
            </tr>
            <tr>
                <td ALIGN="LEFT">Net Income (Loss)</td>
                <td ALIGN="RIGHT"><b>$<?php echo number_format($netIncome,2,'.',','); ?></b></td>
            </tr>
            <tr>
                <td ALIGN="LEFT">Dividends Declared</td>
                <td ALIGN="RIGHT"><b>$<?php echo number_format($dividendsDeclaredValue,2,'.',','); ?></b></td>
            </tr>
            <tr>
                <td ALIGN="LEFT" style = "border-top: 1px solid">Ending Retained Earnings</td>
                <td id="totalDr" ALIGN="RIGHT" style = "border-top: 1px solid">
                    <b>$<?php echo number_format($newRetainedEarningsValue,2,'.',','); ?></b></td>
            </tr>
        </table>
    </div>

@endsection

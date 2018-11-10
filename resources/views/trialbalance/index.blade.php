@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h1>Trivial Accounting</h1>
        <h1>Trial Balance</h1>
        <h2>as of <?php echo date("m/d/y")?></h2>
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
            @endphp
            @forelse($accounts as $account)
                    <td>{{$account->account_name}}</td>
                @if($account->account_normal_side_id == 1)
                    <td>{{$account->account_balance}}</td>
                    <td> </td>
                    @php
                        $debitTotal += preg_replace("/[^0-9.]/", "", "$account->account_balance");
                    @endphp
                @elseif($account->account_normal_side_id == 2)
                    <td> </td>
                    <td>{{$account->account_balance}}</td>
                    @php
                        $creditTotal += preg_replace("/[^0-9.]/", "", "$account->account_balance");
                    @endphp
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
                <td><b>Total Balances</b></td>
                <td><b>$<?php echo $debitTotal; ?></b></td>
                <td><b>$<?php echo $creditTotal; ?></b></td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

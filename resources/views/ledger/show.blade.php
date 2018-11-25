@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h1><?php echo $accountName; ?></h1>
        <table class="table table-striped">
            <thread>
                <th>Date</th>
                <th>Description</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
            </thread>

            <tbody>
            @php
            $balance = 0;
            @endphp
            @forelse($transactions as $transaction)
                <td>{{$transaction->created_at}}</td>
                <td>{{$transaction->description}}</td>

                @php
                    $transactionAmount = $transaction->amount
                @endphp

                @if($transaction->debit > 0)
                        <td ALIGN="RIGHT">$<?php echo number_format($transactionAmount,2,'.',','); ?></td>
                        <td> </td>
                    @if($accountNormalSide == 1)
                        @php
                            $balance += $transaction->amount;
                        @endphp
                    @elseif($accountNormalSide == 2)
                        @php
                            $balance -= $transaction->amount;
                        @endphp
                    @endif
                @elseif($transaction->debit == 0)
                        <td> </td>
                        <td ALIGN="RIGHT">$<?php echo number_format($transactionAmount,2,'.',','); ?></td>
                    @if($accountNormalSide == 1)
                        @php
                            $balance -= $transaction->amount;
                        @endphp
                    @elseif($accountNormalSide == 2)
                        @php
                            $balance += $transaction->amount;
                        @endphp
                    @endif
                @endif
                <td ALIGN="RIGHT">$<?php echo number_format($balance,2,'.',','); ?></td>


                </tr>
            @empty
                <tr>
                    <td colspan=5>
                        There are no transactions.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection

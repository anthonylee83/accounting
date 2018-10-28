@extends('layouts.app')



@section('content')


    <div class='col-xs-12 col-md-8 mx-auto'>
        <h1>Trial Balance</h1>
        <h2><?php echo date("m/d/y")?></h2>
        <table class="table table-striped">
            <thread>
                <th>Account</th>
                <th>Debit</th>
                <th>Credit</th>
            </thread>

            <tr>
            @php
                $debitTotal = 0;
                $creditTotal = 0;
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
                <td>Totals</td>
                <td><?php echo $debitTotal; ?></td>
                <td><?php echo $creditTotal; ?></td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

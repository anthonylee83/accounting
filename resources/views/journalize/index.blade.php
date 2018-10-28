@extends('layouts.app')

@section('content')
    <h1>Journal Entries</h1>

    <journalizer :accounts="{{json_encode($accounts)}}"></journalizer>

    <table class="table table-striped table-hover">
        <thead>
            <th>Date</th>
            <th>Reference</th>
            <th>Accounts</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Approved</th>
            <th>Approved By</th>
            @if( Auth::user()->profile->access_level_id == 2)
                <th></th>
            @endif
        </thead>
        <tbody>
    @forelse($entries as $je)
        <tr>
            <td>{{$je->created_at->format('m/d/y')}}</td>
            <td>{{$je->reference}}</td>
            
            <td col=4>
             <table>
                @foreach($je->transactions() as $transaction)
                    <tr>
                        <td>{{ $transaction->account->name }}</td>
                        <td>{{ $transaction->debit ?? $transaction->amount}}</td>
                        <td>{{ !$transaction->debit ?? $transaction->amount}}</td>
                    </tr>

                @endforeach
                </table>
            </td>
            
            <td>{{ $je->debit ?? $je->amount }}</td>
            <td>{{ !$je->debit ?? $je->amount }}</td>
            <td> {{ $je->approved ? 'Approved' : 'Pending'}}</td>

            @if( $je->approved == true)
                <td>{{$je->user['name']}}</td>
            @else
                <td>N/A</td>
            @endif

            @if( Auth::user()->profile->access_level_id == 2)
                <td>
                    <div>
                        <ul class="navbar-nav ml-auto">
                        <a
                            href="{{action('JournalController@approve', $je->id)}}"
                            class="btn btn-primary">Approve</a>
                        <a
                            href="{{action('JournalController@decline', $je->id)}}"
                            class="btn btn-danger">Remove</a>
                        </ul>
                    </div>
                </td>
            @endif
        </tr>
    @empty
        <tr><td cols=4>No journal entries</td></tr>
    @endforelse
    </tbody>
    </table>
@endsection
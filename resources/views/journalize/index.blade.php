@extends('layouts.app')

@section('content')
    <h1>Journal Entries</h1>

    <journalizer :accounts="{{json_encode($accounts)}}"></journalizer>

    <!--
    <div class="text-right -mb-4">
        <a dusk="newJournal" href="{{action('Admin\UserController@newUser')}}" class="btn btn-lg btn-info btn-circle text-right" role="button"><i class="fas fa-plus text-white"></i></a>
    </div>
    -->

    <table class="table table-striped table-hover">
        <thead>
            <th>Date</th>
            <th>Reference</th>
            <th>Accounts</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Approved</th>
            @if( Auth::user()->profile->access_level_id == 2)
                <th>Controls</th>
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
            <td>{{$je->created_at}}</td>
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
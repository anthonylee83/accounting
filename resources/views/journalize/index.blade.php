@extends('layouts.app')

@section('content')
    <h1>Journal Entries</h1>

    <journalizer :accounts="{{json_encode($accounts)}}">
        @csrf
    </journalizer>
    <div class="d-flex align-items-end flex-column">
    <journal-entry-navigation 
        base_path="/journal" 
        pending_path="/journal"
        approved_Path="/journal/2" 
        path="/{{$path}}" 
        ></journal-entry-navigation>
</div>
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
            
            <td colspan=3>
             <table class="table">
                @foreach($je->transactions()->get() as $transaction)
                    <tr>
                        <td class="{{ $transaction->debit ? 'debit-account' : 'credit-account'}}">{{ $transaction->account->name }}</td>
                        <td class="debit text-right">{{ $transaction->debit ? $transaction->formattedAmount : '' }}</td>
                        <td class="credit text-right">{{ !$transaction->debit ? $transaction->formattedAmount : '' }}</td>
                    </tr>

                @endforeach
                </table>
                <ul style="list-style:none;">
                @forelse($je->attachments()->get() as $attachment)
                    <li class="text-left"><i class="fas fa-paperclip"></i>
                        <a href="{{action('AttachmentController@download', $attachment->id)}}">{{$attachment->filename}}</a>    
                    </li>
                @empty
                @endforelse
                </ul>
            </td>
            <td> {{ $je->status !== null ? $je->status->state : 'Pending' }}</td>

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
                            href="{{action('JournalController@reject', $je->id)}}"
                            class="btn btn-danger">Reject</a>
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
    <div class="d-flex text-center justify-content-center mx-auto">
        {{$entries->links()}}
    </div>
@endsection

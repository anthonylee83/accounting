@extends('layouts.app')

@section('content')
    <h1>Reject Entry?</h1>
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
        <tr>
            <td>{{$entry->created_at->format('m/d/y')}}</td>
            <td>{{$entry->reference}}</td>
            
            <td colspan=3>
             <table class="table">
                @foreach($entry->transactions()->get() as $transaction)
                    <tr>
                        <td class="{{ $transaction->debit ? 'debit-account' : 'credit-account'}}">{{ $transaction->account->name }}</td>
                        <td class="debit text-right">{{ $transaction->debit ? $transaction->formattedAmount : '' }}</td>
                        <td class="credit text-right">{{ !$transaction->debit ? $transaction->formattedAmount : '' }}</td>
                    </tr>

                @endforeach
                </table>
                <ul style="list-style:none;">
                @forelse($entry->attachments()->get() as $attachment)
                    <li class="text-left"><i class="fas fa-paperclip"></i>
                        <a href="{{action('AttachmentController@download', $attachment->id)}}">{{$attachment->filename}}</a>    
                    </li>
                @empty
                @endforelse
                </ul>
            </td>
            <td> {{ $entry->approved ? 'Approved' : 'Pending'}}</td>

            @if( $entry->approved == true)
                <td>{{$entry->user['name']}}</td>
            @else
                <td>N/A</td>
            @endif
            @if( Auth::user()->profile->access_level_id == 2)
                <td>
                    <div>
                        <ul class="navbar-nav ml-auto">
                        <a
                            href="{{action('JournalController@approve', $entry->id)}}"
                            class="btn btn-primary">Approve</a>
                        <a
                            href="{{action('JournalController@reject', $entry->id)}}"
                            class="btn btn-danger">Reject</a>
                        </ul>
                    </div>
                </td>
            @endif
        </tr>
    </tbody>
    </table>
    <div class="d-flex text-center justify-content-center mx-auto">
        <form action="{{ action('JournalController@decline')}}" method="post" class="rejection">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$entry->id}}" />
            
            <label>Rejection Reason</label>
            <textarea class="form-control" name="comments"></textarea>
            <div class="form-group d-flex justify-content-around">
                <button type="submit" class="btn btn-primary">Reject</button>
                <a href="{{action('JournalController@index')}}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection

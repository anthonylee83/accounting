@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <table class="table table-hover table-striped">
        <thead>
            <th>Entry</th>
            <th>Date</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse($entries as $entry)
                <tr>
                    <td>
                        {{$entry->id}}
                    </td>
                    <td>
                        {{$entry->created_at}}
                    </td>
                    <td>
                        <a 
                            href="{{action('JournalController@approve', $entry->id)}}"
                            class="btn btn-primary">Approve</a>
                        <a
                            href="{{action('JournalController@decline', $entry->id)}}"
                            class="btn btn-danger">Reject</a>
                </tr>
            @empty
                <tr><td cols=2>No Pending Entries</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
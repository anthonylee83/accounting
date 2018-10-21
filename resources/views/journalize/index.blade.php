@extends('layouts.app')

@section('content')
    <h1>Journal Entries</h1>

    <journalizer :accounts="{{json_encode($accounts)}}"></journalizer>

    <table class="table table-striped table-hover">
        <thead>
            <th>Reference</th>
            <th>Approved</th>
            <th>Created_at</th>
        </thead>
        <tbody>
    @forelse($entries as $je)
        <tr>
            <td>{{$je->reference}}</td>
            <td> {{ $je->approved ? 'Approved' : 'Pending'}}</td>
            <td>{{$je->created_at}}</td>
        </tr>
    @empty
        <tr><td cols=4>No journal entries</td></tr>
    @endforelse
    </tbody>
    </table>
@endsection
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
            <th>Reference</th>
            <th>Description</th>
            <th>Accounts</th>
            <th>Amounts</th>
            <th>Approved</th>
            <th>Created At</th>
            @if( Auth::user()->profile->access_level_id == 2)
                <th>Controls</th>
            @endif
        </thead>
        <tbody>
    @forelse($entries as $je)
        <tr>
            <td>{{$je->reference}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td> {{ $je->approved ? 'Approved' : 'Pending'}}</td>
            <td>{{$je->created_at}}</td>
            @if( Auth::user()->profile->access_level_id == 2)
                <td>
                    <div>
                        <ul class="navbar-nav ml-auto">
                            <li>
                                <a class="btn btn-primary">Approve</a>
                            </li>
                            <li>
                                <a class="btn btn-danger">Reject</a>
                            </li>
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
@extends('layouts.app')

@section('content')
    <div>
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
            </thead>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->profile->AccessLevel->level}}</td>
                </tr>
            @empty
                <p>An error has occured</p>
            @endforelse
        </table>
    </div>
@endsection
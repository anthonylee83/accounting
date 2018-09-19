@extends('layouts.app')

@section('content')
    <div>
        <dropdown-navigation path="{{$path}}"></dropdown-navigation>
        <div class="text-right -mb-4">
            <a dusk="newUser" href="{{action('Admin\UserController@newUser')}}" class="btn btn-lg btn-info btn-circle text-right" role="button"><i class="fas fa-plus text-white"></i></a>
        </div>
        <table class="table table-hover table-striped table-bordered -mt-4">
            <thead>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th>Status</th>
            </thead>
            @forelse($users as $user)
                <tr>
                    <td>
                        <a href="{{action('Admin\UserController@viewUser', $user->id)}}">
                            {{ $user->email }}
                        </a>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->profile->AccessLevel->level}}</td>
                    <td>@if($user->deleted_at !== null)
                            Deactivated
                        @else
                            Active
                        @endif
                    </td>
                </tr>
            @empty
                <p>An error has occured</p>
            @endforelse
        </table>
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            {{ $users->links() }}
        </div>
    </div>
@endsection
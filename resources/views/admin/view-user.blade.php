@extends('layouts.app')


@section('content')
    @if($errors->any() > 0)

    <ul class="list-group pb-4">
        @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form role="form" action="{{ action('Admin\UserController@updateUser') }}" method="POST">
        {{csrf_field()}}
        {{method_field('put')}}
        <input type="hidden" name="id" value="{{$user->id}}"/>
        <div class="form-group">
        <label for="name" class="sr-only">Full Name</label>
        <input type="text" class="form-control" name="name" required="required" placeholder="Full Name" value="{{$user->name}}" />
        </div>
        <div class="form-group">
        <label for="email" class="sr-only">Email Address</label>
        <input type="email" class="form-control" name="email" required="required" placeholder="Email Address" value="{{$user->email}}"/>
        </div>
        <div class='form-group'>
            <label for='password' class="sr-only">Password</label>
            <input type='password' class='form-control' name='password' placeholder="Password" />
        </div>
        <div class="form-group">
            <select class="form-control" name="access_level_id" required>
                <option disabled value="">Select Access Level</option>
                @forelse($accessLevels as $level)
                    <option value="{{$level->id}}" @if($level->id === $user->profile->access_level_id) Selected @endif>{{ $level->level}}</option>
                @empty
                    <option value="" disabled>A problem has occurred</option>
                @endforelse
            </select>
        </div>
        @include('errors')
        <div class="form-group row">
            <div class="col text-center">
                <button class="btn btn-success" type="submit">Update User</button>
            </div>
            </form>
            <form action="{{ action('Admin\UserController@disableUser') }}" method="POST">
                {{csrf_field()}}
            @if($user->deleted_at === null)
                    {{method_field('delete')}}
                    <input type="hidden" name="id" value="{{$user->id}}" />
                <div class="col text-center">
                    <button type="submit" class="btn btn-danger">Deactivate User</button>
                </div>
            @else
                    {{method_field('patch')}}
                    <input type="hidden" name="id" value="{{$user->id}}" />
                <div class="col text-center">
                    <button type="submit" class="btn btn-danger">Activate User</button>
                </div>
            @endif
            </form>
            <div class="col text-center">
                <a class="btn btn-primary" href="{{ action('Admin\UserController@showUsers') }}">Cancel</a>
            </div>
        </div>
        <br />
        <h3>Suspend User</h3>
        <form class="" action="{{ action('Admin\UserController@suspendUser') }}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$user->id}}" />
            <div class="form-group row">
                <div class="col-6">
                    <label for="start_date">From Date </label>
                </div>
                <div class="col-4">
                    <input class="form-control" type="date" name="start_date" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <label for="end_date">To Date </label>
                </div>
                <div class="col-4">
                    <input class="form-control" type="date" name="end_date" />
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Suspend</button>
        </form>
            
    

@endsection
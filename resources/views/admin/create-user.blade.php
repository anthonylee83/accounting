@extends('layouts.app')


@section('content')
    @if($errors->any() > 0)

    <ul class="list-group pb-4">
        @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form role="form" action="{{ action('Admin\UserController@newUser') }}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
        <label for="name" class="sr-only">Full Name</label>
        <input id="name" type="text" class="form-control" name="name" required="required" placeholder="Full Name" />
        </div>
        <div class="form-group">
        <label for="email" class="sr-only">Email Address</label>
        <input id="email" type="email" class="form-control" name="email" required="required" placeholder="Email Address" />
        </div>
        <div class='form-group'>
            <label for='password' class="sr-only">Password</label>
            <input id="password" type='password' class='form-control' name='password' required='required' placeholder="Password" />
        </div>
        <div class="form-group">
            <select id="access_level_id" class="form-control" name="access_level_id" required>
                <option disabled value="">Select Access Level</option>
                @forelse($accessLevels as $level)
                    <option value="{{$level->id}}">{{ $level->level}}</option>
                @empty
                    <option value="" disabled>A problem has occured</option>
                @endforelse
            </select>
        </div>
        <div class="form-group row">
            <div class="col text-center">
                <button class="btn btn-default" type="submit">Create User</button>
            </div>
            <div class="col text-center">
                <a class="btn btn-danger" href="{{ action('Admin\UserController@showUsers') }}">Cancel</a>
            </div>
        </div>
    </form>

@endsection
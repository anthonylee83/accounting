@extends('layouts.app')


@section('content')

    <form role="form" action="{{ action('Auth\UserController@newUser') }}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
        <label for="name"></label>
        <input type="text" class="form-control" name="name" required="required" />
        </div>
        <div class="form-group">
        <label for="email"></label>
        <input type="email" class="form-control" name="email" required="required" placeholder="Email Address" />
        </div>
        <div class="form-group">
            <select class="form-control" name="access_level" required>
                <option disabled value="">Select Access Level</option>
                @forelse($accessLevels as $level)
                    <option value="{{$level->id}}">{{ $level->level}}</option>
                @empty
                    <option value="" disabled>A problem has occured</option>
                @endforeslse
            </select>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
                <a class="btn btn-danger" href="{{ action('UserController@showUsers') }}">Cancel</a>
            </div>
            <div class="col-xs-6">
                <button class="btn btn-default" type="submit">Create User</button>
            </div>
        </div>
    </form>

@endsection
@extends('layouts.apps')



@section('content')


<div class='col-xs-12 col-md-6 col-md-offset-3'>
    <table class="table table-striped">
        <thead>
        </thead>

        <tbody>
            @forelse($accounts as $account)
                <td>{{$account->name}}</td>
                <td>{{$account->balance()}}
                </tr>
            @empty
                <tr>Something went wrong</tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <p class="py-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    </p>
                    <div class="d-flex justify-content-around">
                        <div class="card">
                                <div class="card-header">
                                    Active Users
                                </div>
                                <div class="card-body">
                                    <p class="text-24">
                                        {{$activeUserCount}}
                                    </p>
                                </div>
                        </div>
                    
                    
                        <div class="card">
                                <div class="card-header">
                                    Disabled Users
                                </div>
                                <div class="card-body">
                                    <p class="text-24">
                                        {{$disabledUserCount}}
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

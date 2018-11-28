@extends('layouts.app')

@section('content')
<div class="col-xs-12 col-md-8 mx-auto">
    <form action="{{action('Accounts\ChartOfAccounts@updateAccount', $account->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group">
            <label for="account_name">Name</label>
            <input type="text" class="form-control" name="account_name" required="required" value="{{$account->account_name}}" />
        </div>
        <div class="form-group">
            <label for="account_type_id">Account Type</label>
            <select name="account_type_id" class="form-control" value="{{ $account->account_type_id}}">
                @foreach($accountTypes as $type)
                <option value={{ $type->id }} @if($type->id == $account->account_type_id)
                        selected @endif>{{$type->account_type}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="account_subtype_id">Account Subtype</label>
            <select name="account_subtype_id" class="form-control" value="{{old('account_subtype_id')}}">
                @foreach($accountSubtypes as $type)
                    <option value={{ $type->id}} @if($type->id == $account->account_subtype_id)
                        selected @endif>{{$type->sub_type}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="account_normal_side_id">Account Normal Side</label>
            <select name="account_normal_side_id" class="form-control" value="{{old('account_normal_side_id')}}">
                @foreach($accountNormalSide as $side)
                    <option value={{ $side->id}} @if($side->id == $account->account_normal_side_id)
                        selected @endif>{{$side->normal_side}}</option>
                @endforeach
            </select>
        </div>
        @include('errors')
        @if(Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif
        <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-default">Update</button>
            @if($account->deleted_at == null)
            <form method="post" action="{{action('Accounts\ChartOfAccounts@deleteAccount', $account->id)}}">
                {{csrf_field()}}
                {{method_field('delete')}}
                <button class="btn btn-primary" type="submit">Deactivate</button>
            </a>
            </form>
            @else
            <form method="post" action="{{action('Accounts\ChartOfAccounts@reactivateAccount', $account->id)}}">
                {{csrf_field()}}
                {{method_field('patch')}}
                <button class="btn btn-primary" type="submit">Activate</button>
            </form>
            @endif
            <a class="btn btn-danger" href="{{action('Accounts\ChartOfAccounts@showAccounts')}}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
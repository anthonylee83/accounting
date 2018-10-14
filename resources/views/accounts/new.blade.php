@extends('layouts.app')

@section('content')
<div class="col-xs-12 col-md-8 col-md-offset-2">
    <h1>New Account</h1>
    <form method="post" action="{{action('Accounts\ChartOfAccounts@storeAccount')}}">
        {{csrf_field()}}
        <div class="form-group">
        <label for="account_name">Name</label>
            <input type="text" class="form-control" name="account_name" required="required" value="{{old('name')}}" />
        </div>
        <div class="form-group">
            <label for="account_type_id">Account Type</label>
            <select name="account_type_id" class="form-control" value="{{old('account_type_id')}}">
                @foreach($accountTypes as $type)
                    <option value={{$type->id}} >{{$type->account_type}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="account_subtype_id">Account Subtype</label>
            <select name="account_subtype_id" class="form-control" value="{{old('account_subtype_id')}}">
                @foreach($accountSubtypes as $type)
                    <option value={{$type->id}} >{{$type->sub_type}}</option>
                @endforeach
            </select>
        </div>
        <!--
        <div class="form-group">
            <label for="account_normal_side">Normal Side</label>
            <select name="account_normal_side" class="form-control" value="{{old('account_normal_side')}}">
                @foreach($accountNormalSide as $side)
                    <option value={{$side->id}} >{{$side->normal_side}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
        <label for="account_balance">Starting Balance</label>
            <input type="text" class="form-control" name="account_balance" required="required" value="{{old('account_balance')}}" />
        </div>
        -->
       @include('errors')
        <div class="form-group d-flex justify-content-around">
            <button type="submit" class="btn btn-success">Submit</button>
            <input class="btn btn-dark" type="reset" value="Reset" id="btnReset">
            <a class="btn btn-danger" href="{{action('Accounts\ChartOfAccounts@showAccounts')}}">Cancel</a>
        </div>
    </form>

</div>
@endsection
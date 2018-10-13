@extends('layouts.app')

@section('content')
<table class="table table-hover table-striped table-bordered -mt-4">
		<thead>
			<th>Account Type</th>
			<th>Total</th>
		</thead>
			<tr>
				<td>{{ 'Standard Users'}}</td>
				<td>{{ $standardCount }}</td>
			</tr>
			<tr>
				<td>{{ 'Manager Users'}}</td>
				<td>{{ $managerCount }}</td>
			</tr>
			<tr>
				<td>{{ 'Admin Users'}}</td>
				<td>{{ $adminCount }}</td>
			</tr>
</table>
<table class="table table-hover table-striped table-bordered -mt-4">
		<thead>
			<th>Status</th>
			<th>Total</th>
		</thead>
			<tr>
				<td>{{ 'Active Users'}}</td>
				<td>{{ $activeUserCount}}</td>
			</tr>
			<tr>
				<td>{{ 'Disabled Users'}}</td>
				<td>{{ $disabledUserCount}}</td>
			</tr>
</table>
@endsection
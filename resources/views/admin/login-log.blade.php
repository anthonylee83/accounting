@extends('layouts.app')

@section('content')
	<table class="table table-hover table-striped table-bordered -mt-4">
		<thead>
			<th>Email</th>
			<th>Date</th>
			<th>Status</th>
		</thead>
		@forelse($logLogin as $login)
			<tr>
				<td>{{ $login->email }}</td>
				<td>{{$login->created_at}}</td>
				<td>{{$login->type}}</td>
			</tr>
		@empty
			<p>An error has occured</p>
		@endforelse
	</table>
	<div clas="paginate">
		{{$logLogin->render()}}
	</div>

</div>
@endsection
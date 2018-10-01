@extends('layouts.app')

@section('content')
<table class="table table-hover table-striped table-bordered -mt-4">
		<thead>
			<th>Email</th>
			<th>Action</th>
			<th>Date</th>
		</thead>
		@forelse($logEvent as $event)
			<tr>
				<td>{{ $event->email }}</td>
				<td>{{ $event->action }}</td>
				<td>{{$event->created_at}}</td>
			</tr>
		@empty
			<p>An error has occured</p>
		@endforelse
</table>
<div clas="paginate">
		{{$logEvent->render()}}
</div>

@endsection
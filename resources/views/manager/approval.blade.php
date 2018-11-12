@extends('layouts.app')

@section('content')
<script>
function Filter() {
    var input, filter, table, tr, td, i, ii;
    input = document.getElementById("Input");
    filter = input.value.toUpperCase();
    table = document.getElementById("jeTable");
    tr = table.querySelectorAll("tbody tr");
    for (i = 0; i < tr.length; i++) {
        var tds = tr[i].getElementsByTagName("td");
        var found = false;
        for (ii = 0; ii < tds.length && !found; ii++) {
            if (tds[ii].textContent.toUpperCase().indexOf(filter) > -1) {
                found = true;
                break;
            }
        }
        tr[i].style.display = found?"":"none";
    }
}
</script>
<input type="text" id="Input" onkeyup="Filter()" placeholder="Search... ">
<div class="d-flex justify-content-center">
	<table id="jeTable" class="table table-striped table-hover">
        <thead>
            <th>Date</th>
            <th>Reference</th>
            <th>Accounts</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Status</th>
            <th>Approved By</th>
            @if( Auth::user()->profile->access_level_id == 2)
                <th></th>
            @endif
        </thead>
        <tbody>
    @forelse($entries as $je)
        <tr>
            <td>{{$je->created_at->format('m/d/y')}}</td>
            <td>{{$je->reference}}</td>
            
            <td colspan=3>
             <table class="table">
                @foreach($je->transactions()->get() as $transaction)
                    <tr>
                        <td class="{{ $transaction->debit ? 'debit-account' : 'credit-account'}}">{{ $transaction->account->name }}</td>
                        <td class="debit">{{ $transaction->debit ? $transaction->formattedAmount : '' }}</td>
                        <td class="credit">{{ !$transaction->debit ? $transaction->formattedAmount : '' }}</td>
                    </tr>

                @endforeach
                </table>
            </td>
			<td> {{ $je->approved}}</td>
            @if( $je->approved != "Pending")
                <td>{{session('email')}}</td>
            @else
                <td>N/A</td>
            @endif
            @if( Auth::user()->profile->access_level_id == 2)
				@if( $je->approved == "Pending")
                <td>
                    <div>
                        <ul class="navbar-nav ml-auto">
                        <a
                            href="{{action('JournalController@approve', $je->id)}}"
                            class="btn btn-primary">Approve</a>
                        <a
                            href="{{action('JournalController@decline', $je->id)}}"
                            class="btn btn-danger">Decline</a>
                        </ul>
                    </div>
                </td>
				@endif
            @endif
        </tr>
    @empty
        <tr><td cols=4>No journal entries</td></tr>
    @endforelse
    </tbody>
    </table>
</div>
{{$entries->links()}}
@endsection
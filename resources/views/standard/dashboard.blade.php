@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
    <thead>
		<th>Financial Ratios</th>
	</thead>
	<tbody>
		<tr>
			<td>Operating Profit Margin: {{$OpProMargin}}%</td>
		</tr>
		<tr>
			<td>Net Profit Margin: {{$NetProMargin}}%</td>
		</tr>
		<tr>
			<td>Return on Assets: {{$ROTA}}%</td>
		</tr>
		<tr>
			<td>Return on Stockholder's Equity: {{$ROSE}}%</td>
		</tr>
    </tbody>
</table>
<table class="table table-striped table-hover">
    <thead>
		<th>Liquidity Ratios</th>
	</thead>
	<tbody>
		<tr>
			<td>Current Ratio: {{$Current}}</td>
		</tr>
    </tbody>
</table>
<table class="table table-striped table-hover">
    <thead>
		<th>Activity Ratios</th>
	</thead>
	<tbody>
		<tr>
			<td>Total Assets Turnover: {{$TAT}}</td>
		</tr>
		<tr>
			<td>Average Collection Period: {{$ACP}} days</td>
		</tr>
    </tbody>
</table>
@endsection
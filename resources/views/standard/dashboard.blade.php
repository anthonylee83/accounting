@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
    <thead>
		<th>Financial Ratios</th>
	</thead>
	<tbody>
		<tr>
			<td>Gross Profit Margin</td>
		</tr>
		<tr>
			<td>Operating Profit Margin</td>
		</tr>
		<tr>
			<td>Net Profit Margin</td>
		</tr>
		<tr>
			<td>Return on Stockholder's Equity</td>
		</tr>
    </tbody>
</table>
<table class="table table-striped table-hover">
    <thead>
		<th>Liquidity Ratios</th>
	</thead>
	<tbody>
		<tr>
			<td>Current Ratio</td>
		</tr>
		<tr>
			<td>Quick Ratio</td>
		</tr>
		<tr>
			<td>Inventory to Net Working Capital</td>
		</tr>
    </tbody>
</table>
<table class="table table-striped table-hover">
    <thead>
		<th>Activity Ratios</th>
	</thead>
	<tbody>
		<tr>
			<td>Total Assets Turnover</td>
		</tr>
		<tr>
			<td>Average Collection Period</td>
		</tr>
    </tbody>
</table>
@endsection
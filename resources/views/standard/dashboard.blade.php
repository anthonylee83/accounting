@extends('layouts.app')

@section('content')
<h2>Financial Statistics</h2>
<hr>
	@if($diffNetProMargin > 100)
	<p align="left">Net Profit Margin: {{$NetProMargin}}% <span id="increase">+{{$diffNetProMargin}}%</span></p>
	<hr>
	@elseif(100 > $diffNetProMargin)
	<p align="left">Net Profit Margin: {{$NetProMargin}}% <span id="decrease">-{{$diffNetProMargin}}%</span></p>
	<hr>
	@else
	<p align="left">Net Profit Margin: {{$NetProMargin}}% --</p>
	<hr>
@endif
	@if($diffROTA > 100)
	<p align="left">Return on Assets: {{$ROTA}}% <span id="increase">+{{$diffROTA}}%</span></p>
	<hr>
	@elseif(100 > $diffROTA)
	<p align="left">Return on Assets: {{$ROTA}}% <span id="decrease">-{{$diffROTA}}%</span></p>
	<hr>
	@else
	<p align="left">Return on Assets: {{$ROTA}}% --</p>
	<hr>
@endif
	@if($diffROSE > 100)
	<p align="left">Return on Stockholder's Equity: {{$ROSE}}% <span id="increase">+{{$diffROSE}}%</span></p>
	<hr>
	@elseif(100 > $diffROSE)
	<p align="left">Return on Stockholder's Equity: {{$ROSE}}% <span id="decrease">-{{$diffROSE}}%</span></p>
	<hr>
	@else
	<p align="left">Return on Stockholder's Equity: {{$ROSE}}% --</p>
	<hr>
@endif
	@if($diffCurrent > 100)
	<p align="left">Current Ratio: {{$Current}} <span id="increase">+{{$diffCurrent}}%</span></p>
	<hr>
	@elseif(100 > $diffCurrent)
	<p align="left">Current Ratio: {{$Current}} <span id="decrease">-{{$diffCurrent}}%</span></p>
	<hr>
	@else
	<p align="left">Current Ratio: {{$Current}} --</p>
	<hr>
@endif
	@if($diffDAR > 100)
	<p align="left">Debt-to-Assets Ratio: {{$DAR}} <span id="increase">+{{$diffDAR}}%</span></p>
	<hr>
	@elseif(100 > $diffDAR)
	<p align="left">Debt-to-Assets Ratio: {{$DAR}} <span id="decrease">-{{$diffDAR}}%</span></p>
	<hr>
	@else
	<p align="left">Debt-to-Assets Ratio: {{$DAR}} --</p>
	<hr>
@endif
	@if($diffDER > 100)
	<p align="left">Debt-to-Equity Ratio: {{$DER}} <span id="increase">+{{$diffDER}}%</span></p>
	<hr>
	@elseif(100 > $diffDER)
	<p align="left">Debt-to-Equity Ratio: {{$DER}} <span id="decrease">-{{$diffDER}}%</span></p>
	<hr>
	@else
	<p align="left">Debt-to-Equity Ratio: {{$DER}} --</p>
	<hr>
@endif
	@if($diffTAT > 100)
	<p align="left">Total Assets Turnover: {{$TAT}} <span id="increase">+{{$diffTAT}}%</span></p>
	<hr>
	@elseif(100 > $diffTAT)
	<p align="left">Total Assets Turnover: {{$TAT}} <span id="decrease">-{{$diffTAT}}%</span></p>
	<hr>
	@else
	<p align="left">Total Assets Turnover: {{$TAT}} --</p>
	<hr>
@endif
	@if($diffACP > 100)
	<p align="left">Average Collection Period: {{$ACP}} days <span id="increase">+{{$diffACP}}%</span></p>
	<hr>
	@elseif(100 > $diffACP)
	<p align="left">Average Collection Period: {{$ACP}} days <span id="decrease">-{{$diffACP}}%</span></p>
	<hr>
	@else
	<p align="left">Average Collection Period: {{$ACP}} days --</p>
	<hr>
@endif
@endsection
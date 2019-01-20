@extends('layout')
@section('content')
	<div class="row">
		<div class="col-sm-8"></div>
		<div class="col-sm-4">
			<a href="{{action('passengerController@create')}}" class="btn btn-primary btn-lg pull-right">Add</a>
		</div>
	</div>
    <table class="table table-hover">
	    <thead>
	      <tr>
	        <th>Data Extract Date</th>
	        <th>Report Period</th>
	        <th>Arrival or Departure</th>
	        <th>Domestic or International</th>
	        <th>Flight Type</th>
	        <th>Passenger Count</th>
	        <th colspan="2">Opsi</th>
	      </tr>
	    </thead>
	    <tbody>
	      @foreach($passengers as $p)
	      <tr>
	      	<td>{{$p['DataExtractDate']}}</td>
	      	<td>{{$p['ReportPeriod']}}</td>
	      	<td>{{$p['Arrival_Departure']}}</td>
	      	<td>{{$p['Domestic_International']}}</td>
	      	<td>{{$p['FlightType']}}</td>
	      	<td>{{$p['Passenger_Count']}}</td>
	      	<td><a href="{{action('passengerController@edit', $p->id)}}" class="btn btn-warning">Edit</a></td>
	        <td>
	        	<form action="{{action('passengerController@destroy', $p->id)}}" method="post">
	        	@csrf
	        		<input name="_method" type="hidden" value="DELETE"><button class="btn btn-danger" type="submit">Delete</button>
	        	</form>
	        </td>
	      </tr>
	      @endforeach
	    </tbody>
	</table> 
	{{ $passengers->render()}}
@endsection
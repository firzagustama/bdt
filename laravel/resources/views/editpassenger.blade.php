@extends('layout')
@section('content')
	<form method="post" action="{{action('passengerController@update', $id)}}">
	  @csrf
	  <div class="form-group">
	    <label for="DataExtractDate">Data Extract Date</label>
	    <input type="date" class="form-control" id="DataExtractDate"name="DataExtractDate" value="{{$passenger->DataExtractDate}}">
	  </div>
	  <div class="form-group">
	    <label for="ReportPeriod">Report Period</label>
	    <input type="date" class="form-control" id="ReportPeriod" name="ReportPeriod" value="{{$passenger->ReportPeriod}}">
	  </div>
	  <div class="form-group">
	    <label for="Arrival_Departure">ArrivalDeparture</label>
	    <input type="text" class="form-control" id="Arrival_Departure" value="{{$passenger->Arrival_Departure}}" name="Arrival_Departure">
	  </div>
	  <div class="form-group">
	    <label for="DomesticInternational">Domestic International</label>
	    <input type="text" class="form-control" id="DomesticInternational" value="{{$passenger->Domestic_International}}" name="Domestic_International">
	  </div>
	  <div class="form-group">
	    <label for="FlightType">Flight Type</label>
	    <input type="text" class="form-control" id="FlightType" name="FlightType" value="{{$passenger->FlightType}}	">
	  </div>
	  <div class="form-group">
	    <label for="Passenger_Count">Passenger Count</label>
	    <input type="number" class="form-control" id="Passenger_Count" name="Passenger_Count" value="{{$passenger->Passenger_Count}}">
	  </div>
	  <button type="submit" class="btn btn-primary mb-2">Update</button>
	</form>
@endsection
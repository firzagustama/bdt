@extends('layout')
@section('content')
	<form method="post" action="{{action('cargoController@update', $id)}}">
	  @csrf
	  <div class="form-group">
	    <label for="DataExtractDate">Data Extract Date</label>
	    <input type="datetime" class="form-control" id="DataExtractDate"name="DataExtractDate" value="{{$cargo->DataExtractDate}}">
	  </div>
	  <div class="form-group">
	    <label for="ReportPeriod">Report Period</label>
	    <input type="datetime" class="form-control" id="ReportPeriod" name="ReportPeriod" value="{{$cargo->ReportPeriod}}">
	  </div>
	  <div class="form-group">
	    <label for="Arrival_Departure">ArrivalDeparture</label>
	    <input type="text" class="form-control" id="Arrival_Departure" value="{{$cargo->Arrival_Departure}}" name="Arrival_Departure">
	  </div>
	  <div class="form-group">
	    <label for="DomesticInternational">Domestic International</label>
	    <input type="text" class="form-control" id="DomesticInternational" value="{{$cargo->Domestic_International}}" name="Domestic_International">
	  </div>
	  <div class="form-group">
	    <label for="CargoType">Cargo Type</label>
	    <input type="text" class="form-control" id="CargoType" name="CargoType" value="{{$cargo->CargoType}}	">
	  </div>
	  <div class="form-group">
	    <label for="AirCargoTons">Air Cargo Tons</label>
	    <input type="number" class="form-control" id="AirCargoTons" name="AirCargoTons" value="{{$cargo->AirCargoTons}}">
	  </div>
	  <button type="submit" class="btn btn-primary mb-2">Update</button>
	</form>
@endsection
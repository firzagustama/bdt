@extends('layout')
@section('content')
	<form method="post" action="{{action('cargoController@store')}}">
	  @csrf
	  <div class="form-group">
	    <label for="DataExtractDate">Data Extract Date</label>
	    <input type="date" class="form-control" id="DataExtractDate"name="DataExtractDate">
	  </div>
	  <div class="form-group">
	    <label for="ReportPeriod">Report Period</label>
	    <input type="date" class="form-control" id="ReportPeriod" name="ReportPeriod">
	  </div>
	  <div class="form-group">
	    <label for="Arrival_Departure">ArrivalDeparture</label>
	    <input type="text" class="form-control" id="Arrival_Departure" placeholder="Arrival/Departure" name="Arrival_Departure">
	  </div>
	  <div class="form-group">
	    <label for="DomesticInternational">Domestic International</label>
	    <input type="text" class="form-control" id="DomesticInternational" placeholder="Domestic/International" name="Domestic_International">
	  </div>
	  <div class="form-group">
	    <label for="CargoType">Cargo Type</label>
	    <input type="text" class="form-control" id="CargoType" name="CargoType" placeholder="Mail/Freight">
	  </div>
	  <div class="form-group">
	    <label for="AirCargoTons">Air Cargo Tons</label>
	    <input type="number" class="form-control" id="AirCargoTons" name="AirCargoTons" placeholder="100">
	  </div>
	  <button type="submit" class="btn btn-primary mb-2">Add</button>
	</form>
@endsection
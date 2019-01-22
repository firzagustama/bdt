@extends('layout')
@section('content')
	<div class="row">
		<div class="col-sm-8"></div>
		<div class="col-sm-4">
			<a href="{{action('cargoController@create')}}" class="btn btn-primary btn-lg pull-right">Add</a>
		</div>
	</div>
    <table class="table table-hover table-striped">
	    <thead>
	      <tr>
	      	<th>Data Extract Date</th>
	        <th>Report Period</th>
	        <th>Arrival Departure</th>
	        <th>Domestic International</th>
	        <th>Cargo Type</th>
	        <th>Air Cargo Tons</th>
	        <th colspan="2">Option</th>
	      </tr>
	    </thead>
	    <tbody>
	      @foreach($cargos as $c)
	      <tr>
	      	<td>{{$c->DataExtractDate}}</td>
	      	<td>{{$c->ReportPeriod}}</td>
	      	<td>{{$c->Arrival_Departure}}</td>
	      	<td>{{$c->Domestic_International}}</td>
	      	<td>{{$c->CargoType}}</td>
	      	<td>{{$c->AirCargoTons}}</td>
	      	<td><a href="{{action('cargoController@edit', $c->id)}}" class="btn btn-warning">Edit</a></td>
	        <td>
	        	<form action="{{action('cargoController@destroy', $c->id)}}" method="post">
	        	@csrf
	        		<input name="_method" type="hidden" value="DELETE"><button class="btn btn-danger" type="submit">Delete</button>
	        	</form>
	        </td>
	      </tr>
	      @endforeach
	    </tbody>
	</table> 

	{{$cargos->render()}}

	<script type="text/javascript">
		window.onload function(){
			var element = document.getElementById("cargo");
			element.classList.add("active");
		}
	</script>
@endsection
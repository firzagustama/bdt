<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\passenger;
use DB;

class passengerController extends Controller
{
    public function create()
    {
        return view('addpassenger');
    }

    public function store(Request $request)
    {
        $passenger = new passenger();
        $passenger->DataExtractDate = $request->DataExtractDate;
        $passenger->ReportPeriod = $request->ReportPeriod;
        $passenger->Arrival_Departure = $request->Arrival_Departure;
        $passenger->Domestic_International = $request->Domestic_International;
        $passenger->FlightType = $request->FlightType;
        $passenger->Passenger_Count = $request->Passenger_Count;
        $passenger->save();

        return redirect('passenger')->with('success', 'Passenger added');
    }

    public function index()
    {
    	$passengers = passenger::paginate(25);
    	return view('passenger', compact('passengers'));
    }

    public function edit($id)
    {
        $passenger = passenger::find($id);
        return view('editpassenger',compact('passenger', 'barangs', 'id'));
    }

    public function update(Request $request, $id)
    {
    	$passenger = passenger::find($id);
        $passenger->DataExtractDate = $request->DataExtractDate;
        $passenger->ReportPeriod = $request->ReportPeriod;
        $passenger->Arrival_Departure = $request->Arrival_Departure;
        $passenger->Domestic_International = $request->Domestic_International;
        $passenger->FlightType = $request->FlightType;
        $passenger->Passenger_Count = $request->Passenger_Count;
        $passenger->save();

        return redirect('passenger')->with('success', 'Passenger updated');
    }

    public function destroy($id)
    {
        $passenger = passenger::find($id);
        $passenger->delete();
        return redirect('passenger')->with('success','Deleted');
    }
}

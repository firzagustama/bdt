<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use GuzzleHttp\Client;

class cargoController extends Controller
{
    public function store(Request $request){
    	// $img = base64_encode(file_get_contents($request->file('img')->path()));

    	$cargo = 
    		DB::table("airport.cargo")
    		->insert([
    			'DataExtractDate' => $request->DataExtractDate,
    			'ReportPeriod' => $request->ReportPeriod,
    			'Arrival_Departure' => $request->Arrival_Departure,
    			'Domestic_International' => $request->Domestic_International,
                'CargoType' => $request->CargoType,
                'AirCargoTons' => $request->AirCargoTons
    		]);

        return redirect('cargo')->with('success', 'cargo berhasil ditambah');
    }

    public function create()
    {
        return view('addcargo');
    }

    public function index(){
        $cargos = DB::table('cargo')->paginate(10);
        return view('cargo', compact('cargos'));
    }

    public function arrival(){
        $client = new Client();
        $cargos = $client->get('localhost:5000/arrival')->getBody();
        $cargos = json_decode($cargos);

        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 10;

        if($cargos){
            $currentResults = array_slice($cargos, ($currentPage - 1) * $perPage, $perPage);
            $cargos = new Paginator($currentResults, count($cargos), $perPage, $currentPage, ['path' => '/cargo']);

            return view('cargo', compact('cargos'));
        }

        $cargos = DB::table('cargo')->where('Arrival_Departure', '=', 'Arrival')->get();
        $result = $client->post('localhost:5000/storeArrival', [
            'json' => [
                $cargos->toJson()
            ]
        ]); 

        $currentResults = $cargos->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $cargos = new Paginator($currentResults, $cargos->count(), $perPage, $currentPage, ['path' => '/cargo']);
        
        return view('cargo', compact('cargos'));
    }

    public function departure(){
        $client = new Client();
        $cargos = $client->get('localhost:5000/departure')->getBody();
        $cargos = json_decode($cargos);

        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 10;

        if($cargos){
            $currentResults = array_slice($cargos, ($currentPage - 1) * $perPage, $perPage);
            $cargos = new Paginator($currentResults, count($cargos), $perPage, $currentPage, ['path' => '/cargo']);

            return view('cargo', compact('cargos'));
        }

        $cargos = DB::table('cargo')->where('Arrival_Departure', '=', 'Departure')->get();
        $result = $client->post('localhost:5000/storeDeparture', [
            'json' => [
                $cargos->toJson()
            ]
        ]); 

        $currentResults = $cargos->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $cargos = new Paginator($currentResults, $cargos->count(), $perPage, $currentPage, ['path' => '/cargo']);
        
        return view('cargo', compact('cargos'));
    }

    public function date(Request $request){
        $client = new Client();
        $cargos = $client->get('localhost:5000/'.$request->date)->getBody();
        $cargos = json_decode($cargos);

        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 10;

        if($cargos){
            $currentResults = array_slice($cargos, ($currentPage - 1) * $perPage, $perPage);
            $cargos = new Paginator($currentResults, count($cargos), $perPage, $currentPage, ['path' => '/cargo']);

            return view('cargo', compact('cargos'));
        }

        $cargos = DB::table('cargo')->where('DataExtractDate', '>=', date($request->date).' 00:00:00')->where('DataExtractDate', '<=', date($request->date).' 23:59:59')->get();
        $result = $client->post('localhost:5000/'.$request->date, [
            'json' => [
                $cargos->toJson()
            ]
        ]); 

        $currentResults = $cargos->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $cargos = new Paginator($currentResults, $cargos->count(), $perPage, $currentPage, ['path' => '/cargo']);
        return view('cargo', compact('cargos'));
    }

    // Skenario Uji Coba tanpa cache

    // public function date(Request $request){
    //     $currentPage = Paginator::resolveCurrentPage();
    //     $perPage = 10;

    //     $cargos = DB::table('cargo')->where('DataExtractDate', '>=', date($request->date).' 00:00:00')->where('DataExtractDate', '<=', date($request->date).' 23:59:59')->get();

    //     $currentResults = $cargos->slice(($currentPage - 1) * $perPage, $perPage)->all();
    //     $cargos = new Paginator($currentResults, $cargos->count(), $perPage, $currentPage, ['path' => '/cargo']);
    //     return view('cargo', compact('cargos'));
    // }

    public function flush()
    {
        $client = new Client();
        $result = $client->post('localhost:5000/flush');

        return $this->index();
    }

    public function edit($id)
    {
        $cargo = DB::table('cargo')->where('id', '=', $id)->first();
        return view('editcargo',compact('cargo','id'));
    }

    public function update(Request $request, $id)
    {
        $cargo = 
            DB::table("airport.cargo")
            ->where('id', '=', $id)
            ->update([
                'DataExtractDate' => $request->DataExtractDate,
                'ReportPeriod' => $request->ReportPeriod,
                'Arrival_Departure' => $request->Arrival_Departure,
                'Domestic_International' => $request->Domestic_International,
                'CargoType' => $request->CargoType,
                'AirCargoTons' => $request->AirCargoTons
            ]);

        return redirect('cargo')->with('success', 'Cargo has been successfully update');
    }

    public function destroy($id)
    {
        $cargo = DB::table('cargo')->where('id','=', $id)->delete();
        return redirect('cargo')->with('success','Cargo has been  deleted');
    }
}

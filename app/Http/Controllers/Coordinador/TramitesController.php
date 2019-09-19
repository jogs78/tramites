<?php

namespace App\Http\Controllers\Coordinador;
use App\Http\Controllers\Controller;
use App\Models\Tramite;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class TramitesController extends Controller
{
	public function index()
    {
        
        $tramites = Tramite::all();       

        $title = 'Listado de tramites';

        //$username= Tramite::all();
            //dd($username);
        return view('crudtramites.index', compact('title', 'tramites','username'));
    }


    public function cambiar($tramite){

        $tramite = Tramite::find($tramite);
        $tramite->status = "Finalizado";
        $tramite->save();
        
        $tramites = Tramite::all();

        $title = 'Listado de tramites';

        return view('crudtramites.index', compact('title', 'tramites'));  
    }

    public function deshabilitar($tramite){
        $tramite = Tramite::find($tramite);
        $tramite->status = "Pendiente";
        $tramite->save();
        
        $tramites = Tramite::all();

        $title = 'Listado de tramites';

        return view('crudtramites.index', compact('title', 'tramites'));  
    }

    public function ver($tramite){
        $tramite = Tramite::where('id', $tramite)->first();
        
        $seguimiento = Seguimiento::where('tramite_seguir', $tramite->id)->get();   
        //print($seguimiento); 

        $title = 'Seguimiento del trámite';

        $username= Tramite::all();
            //dd($username);

        return view ('crudtramites.show', compact('title','seguimiento','username'));

        
    }


    public function getTramites(){
        $tramites = Tramite::all();

       //$historicoT = DB::select('select momento, direccion from historico where tramite_seguir = 27 ORDER BY momento DESC');

        foreach ($tramites as $tramite) {
            $historicoT = DB::table('historico')->where('tramite_seguir', $tramite->id)->orderBy('momento','DESC')->first();            
            if(!$historicoT||strlen($historicoT->lugar) == 0){
                //return response()->Json($historicoT,201);
                $historicoT = (object) array("lugar"=>'Sin registro de ubicación', "direccion"=> 'Sin dirección definida');              
                //$historicoT->lugar = 'No hay';
                //$historicoT->direccion = 'Sin direccion';
                //return response()->Json($tramite->id,201);
            
            //print('El trámite es:'+$tramite->id+' el último lugar en el que estuvo fue:'+$historicoT->lugar);            
            //print($tramite);
            //return response()->Json($tramite, 203);}
            $tramite->lugarActual = $historicoT->lugar;
            $tramite->direccionActual = $historicoT->direccion;
        }
        else{
            $auxlugar = DB::table('lugar')->where('id',$historicoT->lugar)->first();
            $tramite->lugarActual = $auxlugar->Descripcion;
            $tramite->direccionActual = $historicoT->direccion;
        }
        //$auxQuien = DB::table('users')->where('id',$tramite->creo)->select('name')->get();
        $auxQuien = DB::table('users')->where('id',$tramite->creo)->first();
        //return response()->Json($auxQuien->name,201);
        if(!$auxQuien){
            $tramite->creo = 'Nadie';
        }else{
        //return response()->Json($auxQuien,201);
            $tramite->creo = $auxQuien->name;
        }
        //return response()->Json($historicoT,202);
    }
    return response($tramites,201);
        //return response()->Json($tramites,201);
    
}

    public function create()
    {
        return view('crudtramites.create');
    }

    public function show()
    {

        return view('crudtramites.show');
    }

    public function store()
    {

        $data = request()->validate([
        'nombre' => 'required',
           
        ], [
            'nombre.required' => 'El campo nombre es obligatorio'
        ]);

        Tramite::create([
            'nombre' => $data['nombre'],
            'creo' => Auth::user()->id
            
        ]);

        return redirect()->route('crudtramites.index');
    }

     public function edit(Tramite $tramite)
    {
        return view('crudtramites.edit', ['tramite' => $tramite]);
    }


    public function update(Tramite $tramite)
    {
        $data = request()->validate([
            'nombre' => 'required',
            
        ]);

        $tramite->update($data);

        return redirect()->route('crudtramites.index');
    }


    function destroy(Tramite $tramite)
    {
        $tramite->delete();

        return redirect()->route('crudtramites.index');
    }


}
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


class TramiteSeController extends Controller
{
	public function index()
    {
        
        $tramites = Tramite::all();

        $title = 'Listado de tramites';

        return view('crudsecretramites.index', compact('title', 'tramites'));
    }


    public function cambiar($tramite){
        $tramite = Tramite::find($tramite);
        $tramite->status = "Finalizado";
        $tramite->save();
        
        $tramites = Tramite::all();

        $title = 'Listado de tramites';

        return view('crudsecretramites.index', compact('title', 'tramites'));  
    }

    public function deshabilitar($tramite){
        $tramite = Tramite::find($tramite);
        $tramite->status = "Pendiente";
        $tramite->save();
        
        $tramites = Tramite::all();

        $title = 'Listado de tramites';

        return view('crudsecretramites.index', compact('title', 'tramites'));  
    }

    public function ver($tramite){
        $tramite = Tramite::where('id', $tramite)->first();
        
        $seguimiento = Seguimiento::where('tramite_seguir', $tramite->id)->get();   
        //print($seguimiento); 

         $title = 'Seguimiento del trámite';

        $username= Tramite::all();
            //dd($username);

        return view ('crudsecretramites.show', compact('title','seguimiento','username'));
         
    }

    public function getTramites(){
        $tramites = Tramite::all();
        return response()->Json($tramites,201);
    }

    public function create()
    {
        return view('crudsecretramites.create');
    }

    public function show()
    {
        return view('crudsecretramites.show');
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

        return redirect()->route('crudsecretramites.index');
    }

     public function edit(Tramite $tramite)
    {
        return view('crudsecretramites.edit', ['tramite' => $tramite]);
    }


    public function update(Tramite $tramite)
    {
        $data = request()->validate([
            'nombre' => 'required',
            
        ]);

        $tramite->update($data);

        return redirect()->route('crudsecretramites.index');
    }


    function destroy(Tramite $tramite)
    {
        $tramite->delete();

        return redirect()->route('crudsecretramites.index');
    }


}
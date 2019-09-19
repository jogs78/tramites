<?php

namespace App\Http\Controllers\Coordinador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lugares;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class LugaresController extends Controller
{
    public function index()
    {
        //$lugar = DB::table('lugar')->get();
        $lugar = Lugares::all();

        $title = 'Listado de lugares';

        return view('crudlugares.index', compact('title', 'lugar'));
    }

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function getLugar(){
        $lugar = Lugares::all();
        return response()->Json($lugar,200);
    }


   public function show(Lugares $lugares)
    {
        //return view('crudlugares.show', compact('lugar'));
    }


    public function create()
    {
        return view('crudlugares.create');
    }


    public function store()
    {

        $data = request()->validate([
        'Descripcion' => 'required',
            
        ], [
            'Descripcion.required' => 'El campo Descripcion es obligatorio'
        ]);

        Lugares::create([
            'Descripcion' => $data['Descripcion'],
            
        ]);

        return redirect()->route('crudlugares.index');
    }


    public function edit(Lugares $lugares)
    {
        return view('crudlugares.edit', ['lugar' => $lugares]);
    }


    public function update(Lugares $lugares)
    {
        $data = request()->validate([
            'Descripcion' => 'required',
            
        ]);

        $lugares->update($data);

        return redirect()->route('crudlugares.index');
    }


    function destroy(Lugares $lugares)
    {
        $lugares->delete();

        return redirect()->route('crudlugares.index');
    }
}

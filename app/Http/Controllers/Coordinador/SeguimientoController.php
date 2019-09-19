<?php

namespace App\Http\Controllers\Coordinador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguimiento;
use App\Models\Tramite;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SeguimientoController extends Controller
{
	public function index()
    {
        
        $seg = Seguimiento::all();
        $title = 'Seguimientos';

        return view('crudseguimiento.index', compact('title', 'seg'));
    }


    function destroy(Seguimiento $seguimiento)
    {
        $seguimiento->delete();

        return redirect()->route('crudseguimiento.index');
    }



    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function getSeguimiento(){
        $seg = Seguimiento::all();
        return response()->Json($seg,200);
    }


    public function crearSeguimiento (Request $request){
    	if($request->isJson()){
            try{
                Seguimiento::create([
					'tramite_seguir'=> $request->tramite_seguir,
					'quien'=> $request->quien,
					'lugar'=> $request->lugar,	
					'momento'=> $request->momento,
                    'direccion'=> $request->direccion,
				]);
				return response()->Json(['status'=>'ok'],201);
    		  }catch(ModelNotFoundException $e){
    			return response()->Json(['status'=>false, 'error'=>'No se ha podido crear correctamente'], 500);
    		  }            
    	}
    	   else
    		  return response()->Json(['status'=>false,'error'=>'Los datos recibidos no son de tipo JSON'],406);		

	}

    

}
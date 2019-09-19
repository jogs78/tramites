<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        if ($request->input('page')) $hayg=true;
        else $hayg = false;
        if (\Session::has('page')) $hays=true;
        else $hays = false;

        if( $hayg == false && $hays == false ){
            $page=true;
        }
        if( $hayg == false && $hays == true  ){
            $page = \Session::get('page');
        }
        if( $hayg == true  && $hays == false ){
            $page=$request->input('page');
            \Session::put('page' ,  $request->input('page') );
        }
        if( $hayg == true  && $hays == true  ){
            $page=$request->input('page');
            \Session::put('page' ,  $request->input('page') );
        }
        $request->merge( array( 'page' => $page ) );

        $logeado = Auth::user();


        switch ($logeado->rol) {
            case 'JefeDepto':
                return view('home');
                break;
                
            case 'Secretaria':
                
                return view('home2');
                break;

            case 'Prestador':
                return redirect('login')->with(Auth::logout());
                break;
            
        }
    }
}

<?php

namespace App\Http\Controllers\Coordinador;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $title = 'Listado de usuarios';

        return view('crudusers.index', compact('title', 'users'));
    }

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function habilitar($user){
        $user = User::find($user);
        $user->activo = "1";
        $user->save();
        
        $users = User::all();

        $title = 'Listado de usuarios';

        return view('crudusers.index', compact('title', 'users'));  
    }

    public function deshabilitar($user){
        $user = User::find($user);
        $user->activo = "0";
        $user->save();
        
        $users = User::all();

        $title = 'Listado de usuarios';

        return view('crudusers.index', compact('title', 'users'));  
    }


    public function getUsuarios(){
        $users = User::all();
        return response()->Json($users,200);
    }

    public function show(User $user)
    {
        return view('crudusers.show', compact('user'));
    }

    public function create()
    {
        return view('crudusers.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
            'lastname' => 'required',
            'numcontrol' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'lastname' => $data['lastname'],
        //   'tipo' => $data['tipo'],
            'numcontrol' => $data['numcontrol'],
        //    'activo' => $data['activo'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('crudusers.index');
    }

    public function edit(User $user)
    {
        return view('crudusers.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            //'tipo' => 'required',
            'password' => '',
            'numcontrol' => 'required',
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('crudusers.index');
    }

    function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('crudusers.index');
    }

    public function login(Request $request){
        if($request->isJson()){
            try{
                //printf($request);
                //return response((string) $request->email,202);
                $userFuture = $request->Json()->all();
                $user = User::where('email', $userFuture['email'])->first();                

                if($user && Hash::check($userFuture['password'],$user->password)){
                    if($user['rol'] != 'Prestador')
                        return response()->Json(['status'=>false,'error'=>'El usuario no se encuentra prestando servicio'], 406);
                    return response()->Json(['id'=>$user['id'], 'nombre'=>$user['name'], 'apellido'=>$user['lastname'], 'numcontrol'=>$user['numcontrol'], 'activo'=>$user['activo']],200);                   
                }
                else {
                    return response()->Json(['status'=>false,'error'=>'Datos incorrectos'],406);
                }
            }catch(ModelNotFoundException $e){
                return response()->Json(['status'=>false, 'error'=>'Error al cargar el modelo del usuario'], 500);
            }
        }
        else
            return response()->Json(['status'=>false,'error'=>'Los datos recibidos no son de tipo JSON'],406);          
    }

}

<?php

namespace App\Http\Controllers;
use App\Http\Requests\PasswordRequest;
use App\Notifications\NewUserNotification;
use App\Role;
use App\User;
use Auth;
use Faker;
use App\Http\Requests\UserRequest;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::with("roles")->orderBy('usu_nombre')->get();
        $roles = Role::orderBy('name')->get();       
        return view('usuarios.index', compact('usuarios', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view("usuarios.create", compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
           
            $user = new User;
            $user->fill($request->except('idRol'));
            $faker = Faker\Factory::create();
            $password = $faker->password();
            info($password);
            $user->usu_password = bcrypt($password);
            $user->save();
        
            $user->roles()->attach($request->idRol);
            return redirect('usuarios')->with('success', 'Usuario registrado');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$usuario=User::where('usu_id','=','1')->first();*/
        $usuario = User::findOrFail($id);
        $roles = Role::orderBy('name')->get();
        /*$rol = collect($usuario->roles)->sortBy('id')->toArray(); */
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
           
           
            $user->fill($request->all());
            $user->usu_estado = $request->get('usu_estado'); 
            $user->usu_foto = $request->get('usu_foto'); 
            $user->roles()->sync($request->idRol);
            $user->save();
            return redirect('usuarios')->with('success', 'Usuario actualizado');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

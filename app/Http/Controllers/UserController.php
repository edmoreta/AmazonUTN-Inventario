<?php

namespace App\Http\Controllers;
use App\Http\Requests\PasswordRequest;
use App\Notifications\NewUserNotification;
use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Auth;
USE DB;
use Faker;
use App\Http\Requests\UserRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator as LaravelValidator;
use Tavo\ValidadorEc as ValidatorEcPackage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        if ($request) {
            $query = trim($request->get('searchText'));
            $pag = trim($request->get('pag'));
            if ($pag=="") {
                $pag=7;
            }
            $usuarios = DB::table('inv_usuarios as usu')
            ->join('role_user as ru', 'usu.usu_id', '=', 'ru.usu_id')
            ->join('roles as r', 'ru.id', '=', 'r.id')
            ->orWhere('usu.usu_nombre', 'ILIKE', '%' . $query . '%')
            ->orWhere('usu.usu_email', 'ILIKE', '%' . $query . '%')
            ->orWhere('usu.usu_cedula', 'ILIKE', '%' . $query . '%')
            ->orderby('usu.usu_nombre','desc')
            ->paginate($pag);
           info($request->display);
            
            if($request->display=="todos"){
                info("if");
                
            } else if ($request->display == "activo") {
                info("else");
               
             
            } else if($request->display == "inactivo"){
               
            } else if($request->display == "administrador"){

            } else if($request->display == "bodeguero"){
                
            }
            return view('usuarios.index', ["usuarios"  => $usuarios,"searchText" => $query,"pag" => $pag]);    

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Config()
    {
        return view('Settings');
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
    public function change_password()
    {
       // $usuario = Auth::user();
        return view('usuarios.changePassword');
    }

    public function update_password(PasswordRequest $request)
    {        
        try {
            $user = Auth::user();
            $user->usu_password = bcrypt($request->password);
            info($user->usu_password);
            $user->save();

            return redirect('User/change_password')->with('success', 'Contraseña actualizada');
        } catch (Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected $email;
    public function store(UserRequest $request)
    {
        try {
            $user = new User;
            $user->fill($request->except('idRol'));
            $faker = Faker\Factory::create();
            $password = $faker->password();
            $data = array(
                "password" => $password,
            );
            $this->email=$user->usu_email;
            $user->usu_password = bcrypt($password);

            $validatorEc = new ValidatorEcPackage();
            $isValid = $validatorEc->validarCedula($user->usu_cedula);
            if (!$isValid) {
                return back()->with('error_prov', 'La cédula es INCORRECTA')->withInput();
            }
            $user->save();
            $user->roles()->attach($request->idRol);
            Mail::send('emails.sentpassword', $data, function ($m) {
                $m->from('example@gmail.com', 'Su contraseña');
                $m->to($this->email, "User")->subject('Your Reminder!');
            });
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
        if ($id==1) {
            return redirect('usuarios');
        }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Updates(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->usu_id);
            $user->fill($request->all());
            $user->roles()->sync($request->idRol);
            $user->save();
            return redirect('home')->with('success', 'Usuario actualizado');
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

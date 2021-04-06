<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones = Institucion::all();
        return view('layouts.usuarios.unirse', ['usuario' => new User(), 'instituciones' => $instituciones]);
        
        //$user = User::where('created_at', $code)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //Validaciones necesarias para los inputs
        $reglas = $request->validate([
            'password'=> 'required|min:5',
            'nombre' => 'required|min:3|max:20',
            'primer_apellido' => 'required|min:3|max:15',
            'segundo_apellido' => 'required|min:3|max:15',
        ]);

        //Recibir las contraseñas del form y almacenarlas en una variable
        $passw = $request['password'];
        $confPassw = $request['password_confirmation'];
        //Recibir el email, para validar la existencia
        $getEmail = $request['email'];

        //if para ver si el correo existe
        if (User::where('email', '=', $getEmail)->exists()) {
            return back()->withInput()->with('error', 'El correo electrónico que se ingresó ya existe.');
        } else {
            //Comparar las contraseñas
            if ($passw == $confPassw) { //Si son iguales se procede a establecer valores, dentro de la creación y encriptar las contraseñas
                //Usuario::create($request->all());
                $request['codigo_confirmacion'] = Str::random(25);//Generar codigo
                User::create([ //Guardar usuario, resiviendo los datos del request
                    'nombre' => $request['nombre'],
                    'primer_apellido' => $request['primer_apellido'],
                    'segundo_apellido' => $request['segundo_apellido'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'nivel_educativo' => $request['nivel_educativo'],
                    'nombre_institucion' => $request['nombre_institucion'],
                    'semestre' => $request['semestre'],
                    'turno' => $request['turno'],
                    'rol' => "estudiante",
                    'status_usuario' => true,
                    'codigo_confirmacion' => $request['codigo_confirmacion'],
                    'confirmado' => false
                ]);

                $codigo_confirmacion = $request['codigo_confirmacion'];

                //Enviar email
                Mail::send('emails.codigo_confirmacion', ['codigo_confirmacion' => $codigo_confirmacion], function ($message) use ($request) {
                    $message->to($request['email'], $request['nombre'])->subject('Por favor confirma tu correo');
                });


                return back()->with('success', 'Te has registrado correctamente, confirma tu correo electronico. Para poder iniciar sesion.');
            } else { //Si no son iguales se retorna un mensaje
                return back()->withInput()->with('error', 'Las contraseñas deben ser iguales.');
            }
        }
    }

    public function login(Request $request)
    {

        //Obtener email y contraseñas
        $getEmail = $request['email'];
        $getPassword = $request['password'];
        //Buscar el usuario con el email
        $usuario = User::where('email', '=', $getEmail)->first();

        if ($usuario) {
            //Comprobar la contraseña y la contaseña encriptada
            if($usuario->confirmado == true){// validar que el correo electronico sea confirmado.
                
                if (Hash::check($getPassword, $usuario->password)) {
                    Auth::login($usuario);//Se abre la sesion
                    if ($usuario->rol == "estudiante") {
                        return redirect()->intended('alumno');
                    } else if ($usuario->rol == "docente") {
                        return redirect()->intended('docente');
                    } else if ($usuario->rol == "administrador") {
                        return redirect()->intended('administrador');
                    } else {
                        return redirect('/');
                        return back()->with('error', 'Ocurrio un error consulta al admin.');
                    }
                }else{
                    return back()->withInput()->with('error', 'Contraseña incorrecta.');
                }
            } else {
                
                return back()->withInput()->with('error', 'Porfavor, confirma tu correo electronico, para poder iniciar sesión.');
            }
        }else{
            return back()->withInput()->with('error', 'Esta cuenta no existe, porfavor registrate.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); //Se cierra la sesión
        $request->session()->invalidate(); //Se invalida la sesión
        $request->session()->regenerateToken(); //Se regenera el token, para una nueva sesion
        return redirect('/');//Se redirecciona a la raíz de la pagina.
    }

    public function verify($code)
    {
        $user = User::where('codigo_confirmacion', $code)->first();

        if (!$user)
            return redirect('/')->with('error', 'Este usuario no existe o ya confirmaste tu codigo.');;

        $user->confirmado = true;
        $user->codigo_confirmacion = null;
        $user->save();

        return redirect('/')->with('success', 'Has confirmado correctamente tu correo!');
    }
}

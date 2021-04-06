<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        return view('layouts.usuarios.miPerfil');
    }

    public function update (Request $request, $id){
        $usuario = User::findOrFail($id);

        $usuario->update($request->all());
        return back()->with('success', 'Tus datos se actualizaron correctamente');
    }

}

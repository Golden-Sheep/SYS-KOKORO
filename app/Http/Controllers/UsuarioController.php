<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = Usuario::where('cadastroAprovado','=',1)->get();
        return view('usuario\homeUsuario',['usuario' => $usuarios]);
    }


    public function viewUsuariosPedentes(){
        $usuarios = Usuario::where('cadastroAprovado','=',0)->get();
        return view('usuario\homeUsuariosPedentes',['usuario' => $usuarios]);
    }

    public function viewEditarUsuario($id){
    $usuario = Usuario::findOrFail($id);
    return view('usuario\homeEditarUsuario',['usuario' => $usuario]);
    }

    public function cadastro(Request $request){
        $usuario = new Usuario();
        $usuario-> nome = $request->nome;
        $usuario-> email = $request->email;
        $usuario-> password = $request->senha;
        $usuario-> cargo = $request->cargo;
        $usuario->cadastroAprovado = 0;
        $usuario->telefone = $request->telFixo;
        $usuario->celular = $request->telCelular;
        $usuario->endereco = $request->endereco;
        $usuario-> dataNascimento = $request->data;
        $usuario->save();

        return Redirect::to('/');
    }


    public function buscarDadosUsuario(Request $request){
         return Usuario::find($request -> id);
    }

    public function atualizar($id,Request $request){
        $usuario = Usuario::findorfail($id);
        $usuario-> nome = $request->nome;
        $usuario-> email = $request->email;
        $usuario-> password = $request->senha;
        $usuario-> cargo = $request->cargo;
        $usuario->cadastroAprovado = 1;
        $usuario->telefone = $request->telFixo;
        $usuario->celular = $request->telCelular;
        $usuario->endereco = $request->endereco;
        $usuario-> dataNascimento = $request->data;
        $usuario->update();

        return Redirect::to('/usuario');
    }

}

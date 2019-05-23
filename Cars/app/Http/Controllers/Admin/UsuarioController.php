<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;

class UsuarioController extends Controller
{
    public function login(Request $request){        
        $dados = $request->all();
        if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){        
            \Session::flash('messagem',['msg'=>'Login realizado com sucesso!','class'=>'alert alert-success alert-dismissible']);            
            return redirect()->route('admin.principal');
        }
        \Session::flash('messagem',['msg'=>'Usuario ou senha, invalidos!','class'=>'alert alert-danger alert-dismissible']);
        return redirect()->route('admin.login');        
    }  
    public function sair(){
        Auth::logout();
        return redirect()->route('admin.login'); 
    }
    public function index(){
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }
    public function adicionar(){
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request){        
        $dados = $request->all();              
        DB::beginTransaction();
        try {
            DB::table('users')->insert([
                'name'=>$dados['name'],
                'email'=>$dados['email'],
                'password'=>bcrypt($dados['password']),                
            ]);
            DB::commit();            

            \Session::flash('messagem',['msg'=>'Usuario cadastrado com sucesso!','class'=>'alert alert-success alert-dismissible']);    
            return redirect()->route('admin.usuarios');

        } catch (\Exception $e) {
            DB::rollback();            
            \Session::flash('messagem',['msg'=>'Dados incorretos, verifique!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.usuarios.adicionar');
        }         
    }

    public function editar($id){
        $usuarios = User::find($id);        
        return view('admin.usuarios.editar',compact('usuarios'));        
    }
    public function atualizar(Request $request, $id){        
        $dados = $request->all();
        if(isset($dados['password']) && strlen($dados['password'])>5 ){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
        }  
        
        DB::beginTransaction();
        try {
            DB::table('users')
                ->where('id',$id)
                ->update(
                    [
                        'name'=>$dados['name'],
                        'email'=>$dados['email'],
                        'password'=>bcrypt($dados['password']),                
                    ]
                );

            DB::commit();            

            \Session::flash('messagem',['msg'=>'Usuario cadastrado com sucesso!','class'=>'alert alert-success alert-dismissible']);    
            return redirect()->route('admin.usuarios');

        } catch (\Exception $e) {
            DB::rollback();            
            \Session::flash('messagem',['msg'=>'Dados incorretos, verifique!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.usuarios.adicionar');
        }
    }
    public function deletar(Request $request,$id){     
        try {                
            $usuario = User::find($id)->delete();    
            \Session::flash('messagem',['msg'=>'Usuario deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);    
            return redirect()->route('admin.usuarios');    
        } catch (\Exception $e) {
            DB::rollback();            
            \Session::flash('messagem',['msg'=>'Erro ao deletar usuario, verifique!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.usuarios');
        }            
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cores;
use DB;

class CorController extends Controller
{   
    public function index(){
        $cores = Cores::all();
        return view('admin.cores.index', compact('cores'));
    }
    public function adicionar(){
        return view('admin.cores.adicionar');
    }
    
    public function salvar(Request $request){
        $cores = $request->all();                
        DB::beginTransaction();
        try {
            DB::table('cores')->insert([
                'corNome'=>$cores['corNome'],
                'corStatus'=>'1',                
            ]);
            DB::commit();            

            \Session::flash('messagem',['msg'=>'Cor cadastrado com sucesso!','class'=>'alert alert-success alert-dismissible']);    
            return redirect()->route('admin.cores');

        } catch (\Exception $e) {
            DB::rollback();            
            \Session::flash('messagem',['msg'=>'Dados incorretos, verifique!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.cores.adicionar');
        }         
    }
    public function editar($id){       
        $cores = Cores::find($id);                        
        return view('admin.cores.editar',compact('cores'));        
    }
    public function atualizar(Request $request, $id){        
        $dados = $request->all();
        
        DB::beginTransaction();
        try {
            DB::table('cores')
                ->where('id',$id)
                ->update(
                    [
                        'corNome'=>$dados['corNome'],                        
                    ]
                );

            DB::commit();            

            \Session::flash('messagem',['msg'=>'Cor cadastrado com sucesso!','class'=>'alert alert-success alert-dismissible']);    
            return redirect()->route('admin.cores');

        } catch (\Exception $e) {
            DB::rollback();            
            \Session::flash('messagem',['msg'=>'Dados incorretos, verifique!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.cores.adicionar');
        }
    }
    
    public function deletar(Request $request,$id){     
        try {                
            $usuario = Cores::find($id)->delete();    
            \Session::flash('messagem',['msg'=>'Cor deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);    
            return redirect()->route('admin.cores');    
        } catch (\Exception $e) {
            DB::rollback();            
            \Session::flash('messagem',['msg'=>'Erro ao deletar cor, verifique!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.cores');
        }           
    }    
}

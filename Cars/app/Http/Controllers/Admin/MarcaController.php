<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marcas;
use DB;

class MarcaController extends Controller
{
    public function index(){
        $marcas = Marcas::all();
        return view('admin.marcas.index', compact('marcas'));
    }
    public function adicionar(){
        return view('admin.marcas.adicionar');
    }
    
    public function salvar(Request $request){
        $marcas = $request->all();                
        DB::beginTransaction();
        try {
            DB::table('marcas')->insert([
                'marcaNome'=>$marcas['marcaNome'],
                'marcaStatus'=>'1',                
            ]);
            DB::commit();            

            \Session::flash('messagem',['msg'=>'Marca cadastrado com sucesso!','class'=>'alert alert-success alert-dismissible']);    
            return redirect()->route('admin.marcas');

        } catch (\Exception $e) {
            DB::rollback();            
            \Session::flash('messagem',['msg'=>'Marca incorretos, verifique!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.marcas.adicionar');
        }         
    }
    public function editar($id){       
        $marcas = Marcas::find($id);                        
        return view('admin.marcas.editar',compact('marcas'));        
    }
    public function atualizar(Request $request, $id){        
        $dados = $request->all();
        
        DB::beginTransaction();
        try {
            DB::table('marcas')
                ->where('id',$id)
                ->update(
                    [
                        'marcaNome'=>$dados['marcaNome'],                        
                    ]
                );

            DB::commit();            

            \Session::flash('messagem',['msg'=>'Marca cadastrado com sucesso!','class'=>'alert alert-success alert-dismissible']);    
            return redirect()->route('admin.marcas');

        } catch (\Exception $e) {
            DB::rollback();            
            \Session::flash('messagem',['msg'=>'Dados incorretos, verifique!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.marcas.adicionar');
        }
    }
    
    public function deletar(Request $request,$id){     
        try {                
            $usuario = Marcas::find($id)->delete();    
            \Session::flash('messagem',['msg'=>'Marca deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);    
            return redirect()->route('admin.marcas');    
        } catch (\Exception $e) {
            DB::rollback();            
            \Session::flash('messagem',['msg'=>'Erro ao deletar cor, verifique!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.marcas');
        }           
    }        
}

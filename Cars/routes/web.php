<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',['as'=>'site.home',function(){
    return view('site.home');
}]);
Route::get('/sobre',['as'=>'site.sobre',function(){
    return view('site.sobre');
}]);
Route::get('/contato',['as'=>'site.contato',function(){
    return view('site.contato');
}]);
Route::get('/imovel/{id}/{titulo?}',['as'=>'site.imovel', function(){
    return view('site.imovel');
}]);
Route::get('/admin/login',['as'=>'admin.login', function(){
    return view('admin.login.index');
}]);

Route::post('/admin/login',['as'=>'admin.login','uses'=>'Admin\UsuarioController@login']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/login/sair',['as'=>'admin.login.sair','uses'=>'Admin\UsuarioController@sair']);
    
    Route::get('/admin',['as'=>'admin.principal',function(){
        return view('admin.principal.index');
    }]);

    /*Usuarios */
    Route::get('/admin/usuarios',['as'=>'admin.usuarios','uses'=>'Admin\UsuarioController@index']);    

    Route::get('/admin/usuarios/adicionar',['as'=>'admin.usuarios.adicionar','uses'=>'Admin\UsuarioController@adicionar']);
    
    Route::post('/admin/usuarios/salvar',['as'=>'admin.usuarios.salvar','uses'=>'Admin\UsuarioController@salvar']);

    Route::get('/admin/usuarios/editar/{id}',['as'=>'admin.usuarios.editar','uses'=>'Admin\UsuarioController@editar']);

    Route::put('/admin/usuarios/atualizar/{id}',['as'=>'admin.usuarios.atualizar','uses'=>'Admin\UsuarioController@atualizar']);

    Route::get('/admin/usuarios/deletar/{id}',['as'=>'admin.usuarios.deletar','uses'=>'Admin\UsuarioController@deletar']);

    /*Cor*/
    Route::get('/admin/cores',['as'=>'admin.cores','uses'=>'Admin\CorController@index']);    

    Route::get('/admin/cores/adicionar',['as'=>'admin.cores.adicionar','uses'=>'Admin\CorController@adicionar']);
    
    Route::post('/admin/cores/salvar',['as'=>'admin.cores.salvar','uses'=>'Admin\CorController@salvar']);

    Route::get('/admin/cores/editar/{id}',['as'=>'admin.cores.editar','uses'=>'Admin\CorController@editar']);

    Route::put('/admin/cores/atualizar/{id}',['as'=>'admin.cores.atualizar','uses'=>'Admin\CorController@atualizar']);

    Route::get('/admin/cores/deletar/{id}',['as'=>'admin.cores.deletar','uses'=>'Admin\CorController@deletar']);    

    /*Marca*/
    Route::get('/admin/marcas',['as'=>'admin.marcas','uses'=>'Admin\MarcaController@index']);    

    Route::get('/admin/marcas/adicionar',['as'=>'admin.marcas.adicionar','uses'=>'Admin\MarcaController@adicionar']);
    
    Route::post('/admin/marcas/salvar',['as'=>'admin.marcas.salvar','uses'=>'Admin\MarcaController@salvar']);

    Route::get('/admin/marcas/editar/{id}',['as'=>'admin.marcas.editar','uses'=>'Admin\MarcaController@editar']);

    Route::put('/admin/marcas/atualizar/{id}',['as'=>'admin.marcas.atualizar','uses'=>'Admin\MarcaController@atualizar']);

    Route::get('/admin/marcas/deletar/{id}',['as'=>'admin.marcas.deletar','uses'=>'Admin\MarcaController@deletar']);    
});




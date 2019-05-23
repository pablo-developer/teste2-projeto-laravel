<style>
#centralizar{
    margin: 0 auto;
    float: none;
}
</style>
@extends('layouts.app')

@section('content')
    <div  class="container">
        <h2 align="center">Lista de Usuários</h2>  
        <div class="row">
            <nav>
                <div class="nav-wrapper"  aria-label="breadcrumb">
                    <div class="col-md-12 breadcrumb">                        
                        <li><a class="breadcrumb-item" href="{{route('admin.principal')}}">Iniciar</a></li>
                        <li><a>Lista de Usuarios</a></li>                            
                    </div> 
                </div>
            </nav>
        </div>  
        <div class="row">
            <div class="col-md-8 col-md-12" id="centralizar">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ação</th>
                        </tr>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>
                                    <a class="btn btn-info" href="{{route('admin.usuarios.editar',$usuario->id)}}">Editar</a>                
                                        <a class="btn btn-warning" href="
                                        javascript: 
                                            if(confirm('Deleta este registro?')){
                                                window.location.href='{{route('admin.usuarios.deletar',$usuario->id)}}'
                                            }                                             
                                        ">Delete</a>                
                                    </td>            
                                </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
                <div class="row">                    
                    <a class="btn btn-primary" href="{{route('admin.usuarios.adicionar')}}">Adicionar</a>                     
                </div>
            </div>
        </div>    
    </div>
@endsection
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
                        <li><a>Lista de Marca</a></li>                            
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
                            <th>Ação</th>
                        </tr>
                        <tbody>
                            @foreach($marcas as $marca)
                                <tr>
                                    <td>{{$marca->id}}</td>
                                    <td>{{$marca->marcaNome}}</td>                                    
                                    <td>
                                    <a class="btn btn-info" href="{{route('admin.marcas.editar',$marca->id)}}">Editar</a>                
                                        <a class="btn btn-warning" href="
                                        javascript: 
                                            if(confirm('Deleta este registro?')){
                                                window.location.href='{{route('admin.marcas.deletar',$marca->id)}}'
                                            }                                             
                                        ">Delete</a>                
                                    </td>            
                                </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
                <div class="row">                    
                    <a class="btn btn-primary" href="{{route('admin.marcas.adicionar')}}">Adicionar</a>                     
                </div>
            </div>
        </div>    
    </div>
@endsection
<style>
#centralizar{
    margin: 0 auto;
    float: none;
}
td{
    text-transform: uppercase;
}
</style>
@extends('layouts.app')

@section('content')
    <div  class="container">
        <h2 align="center">Lista de Tipos</h2>         
        <div class="row">
            <nav>
                <div class="nav-wrapper"  aria-label="breadcrumb">
                    <div class="col-md-12 breadcrumb">                        
                        <li><a class="breadcrumb-item" href="{{route('admin.principal')}}">Iniciar</a></li>
                        <li><a>Lista de Cores</a></li>                            
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
                            @foreach($cores as $registro)
                                <tr>
                                    <td>{{$registro->id}}</td>
                                    <td>{{$registro->corNome}}</td>                                    
                                    <td>
                                    <a class="btn btn-info" href="{{route('admin.cores.editar',$registro->id)}}">Editar</a>        
                                        <a class="btn btn-warning" href="
                                        javascript: 
                                            if(confirm('Deleta este registro?')){
                                                window.location.href='{{route('admin.cores.deletar',$registro->id)}}'
                                            }                                             
                                        ">Delete</a>      
                                    </td>            
                                </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
                <div class="row">                    
                    <a class="btn btn-primary" href="{{route('admin.cores.adicionar')}}">Adicionar</a>                     
                </div>
            </div>
        </div>    
    </div>
@endsection
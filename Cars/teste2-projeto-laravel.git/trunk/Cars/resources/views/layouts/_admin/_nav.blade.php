<nav class="navbar navbar-inverse">        
        <div class="container container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>            
            <a class="navbar-brand" href="#">SisAdmin</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">        

                <ul class="nav navbar-nav navbar-right">            
                    <li class=""><a href="{{route('admin.principal')}}">Inicial</a> </li>                
                    <li class=""><a target="_blanck" href="{{route('site.home')}}">Site</a> </li>                
                    @if(Auth::guest())
                        <li class=""><a href="{{route('admin.login')}}">Login</a></li>                                    
                    @else                    
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#!">{{ Auth::user()->name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="{{route('admin.usuarios')}}">Usuarios</a></li>
                          <li><a href="{{route('admin.cores')}}">Cores</a></li>
                          <li><a href="{{route('admin.marcas')}}">Marcas</a></li>
                          <li><a href="#">Veiculos</a></li>
                        </ul>
                      </li>                                            
                        
                        <li class=""><a href="{{route('admin.login.sair')}}">Sair</a></li>                                    
                    @endif                    
                </ul>            
            </div>
        </div>
    </nav>
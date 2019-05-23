<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>   
    </head>
    <body>        
        <header>
            @include('layouts._admin._nav')        
        </header>  
        <main>
            @if(Session::has('messagem'))
                <div class="container">
                    <div class="row">
                        <div class="card {{ Session::get('messagem')['class']}}">
                            <div align="center" class="card-content">                                
                                {{ Session::get('messagem')['msg']}}
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            @endif
            @yield('content')
        </main>                
        @include('layouts._admin._footer')      
    </body>
</html>

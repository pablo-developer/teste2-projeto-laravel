
<style>
   
body {
  margin: 0;
  padding: 0;
  
  height: 100vh;
}

input#password.form-control{
  border-width: 0px 0px 1px 0px;
  box-shadow: 0 0 0 0;
  border-radius: 0px;
}

input#email.form-control{
  border-width: 0px 0px 1px 0px;
  box-shadow: 0 0 0 0;
  border-radius: 0px;
}

#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px; 
  background-color: #fff;  
}

#login-column{
    margin: 0 auto;
    float: none;
}

}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
  
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <div id="login">
      
      <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">                      
                      <form id="login-form" class="form" action="{{route('admin.login')}}" method="post">  
                          {{csrf_field()}}
                          <h3 class="text-center text-info">Login</h3>
                          <div class="form-group">                              
                              <input type="text" id="email" name="email" class="form-control" placeholder="Usuario@email.com">
                          </div>
                          <div class="form-group">                              
                              <input type="password" id="password" name="password" class="form-control" placeholder="Senha">
                          </div>
                          <div class="form-group">                              
                              <input type="submit" name="submit" class="btn btn-info btn-md" value="Entrar">
                          </div>
                          
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>


 
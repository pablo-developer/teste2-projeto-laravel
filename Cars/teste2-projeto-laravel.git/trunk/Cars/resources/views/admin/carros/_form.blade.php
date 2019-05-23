
<div class="form-group">        
<input class="form-control" type="text" name="name" class="validade" placeholder="Nome" value="{{isset($usuarios->name) ? $usuarios->name:''}}">                
</div>
<div class="form-group">        
    <input class="form-control" type="text" name="email" class="validade" placeholder="Usuario@email.com" value="{{isset($usuarios->name)? $usuarios->email:''}}">        
</div>
<div class="form-group">        
    <input class="form-control" type="password" name="password" class="validade" placeholder="Senha">        
</div>
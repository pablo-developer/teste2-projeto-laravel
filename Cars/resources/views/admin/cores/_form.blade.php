<style>
    input.form-control{
        text-transform: uppercase;        
    }
</style>
<div class="form-group">        
    <input class="form-control" type="text" name="corNome" class="validade" placeholder="Nome" value="{{isset($cores->corNome) ? $cores->corNome:''}}">                
</div>

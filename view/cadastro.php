<?php
    // var_dump($_POST);
    // var_dump($_FILES);
    require_once '../conexao.php';
    if(isset($_POST['txtEmail'])){
        
    }

    

?>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input 
            type="email" 
            class="form-control" 
            name="txtEmail"  
            placeholder="Seu melhor e-mail"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input 
            type="password" 
            class="form-control"
            name="txtSenha"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input 
            type="text" 
            class="form-control"
            name="txtNome"
            placeholder="Seu nome"
        >
    </div>

    <div class="row mb-4">
        <div class="col">
            <label class="form-label">Foto perfil</label>
            <input type="file" class="form-control" name="fotoPerfil">
        </div>
        <div class="col">
            <label class="form-label">Foto capa</label>
            <input type="file" class="form-control" name="fotoCapa">
        </div>
    </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
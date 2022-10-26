<?php
    require_once('./conexao.php');
    require_once('./Upload.php');
    if(isset($_POST['txtEmail'])){
        
        $links=[];
        $upload = new Upload($_FILES['fotoPerfil'],'img/');
        $links['fotoPerfil'] =  $upload->salvarImagem();
        sleep(1);
        $upload2 = new Upload($_FILES['fotoCapa'],'img/');
        $links['fotoCapa'] = $upload2->salvarImagem();

        $dados_para_cadastrar = [
            ':email'=>$_POST['txtEmail'], 
            ':senha'=>$_POST['txtSenha'], 
            ':nome'=>$_POST['txtNome'], 
            ':foto'=>$links['fotoPerfil'], 
            ':capa'=>$links['fotoCapa']
        ];
        $cmdSql = 'CALL usuario_cadastrar(:email, :senha, :nome, :foto, :capa);';

        $cxPrepare = $cx->prepare($cmdSql);
        $result = $cxPrepare->execute($dados_para_cadastrar);
        if($result){
            echo'<script>alert("Usuário cadastrado")</script>';
        }
        else{
            echo'<script>alert("Deu ruim")</script>';
        }
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
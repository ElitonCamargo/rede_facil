<?php
    require_once('conexao.php');
    if(isset($_POST['btnLogin'])){
        $email = $_POST['txtLoginEmail'];
        $senha = $_POST['txtLoginSenha'];

        $cmdSql = 'CALL usuario_consultarPorEmail(:email)';
        $cxPronta = $cx->prepare($cmdSql);
        if($cxPronta->execute([':email'=>$email])){
            $usuario = $cxPronta->fetch(PDO::FETCH_OBJ);
            if($usuario->senha == $senha){
                echo '<script>alert("Usuário efetuou login com sucesso")</script>';
            }
        }



    }
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    
    <!-- menu -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand">Rede-Facil</a>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="?home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?cadastro">Cadastro</a>
                </li>
            </ul>
            <form class="d-flex form-inline" method="POST">
                <input class="form-control mx-2" name="txtLoginEmail" type="text" placeholder="E-mail">
                <input class="form-control mx-2" name="txtLoginSenha" type="password" placeholder="Senha">
                <button class="btn btn-outline-success my-2 my-sm-0" name="btnLogin" type="submit">Login</button>
            </form>

        </div>
    </nav>
    <!-- menu -->

    <div class="container">
        <!-- rotas -->    
            <?php
                if(isset($_GET['cadastro'])){
                    require_once 'view/cadastro.php';
                }
                elseif(isset($_GET['home'])){
                    require_once './view/home.php';
                }
                else{
                    require_once './view/home.php';
                }
            ?>
        <!-- rotas -->
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
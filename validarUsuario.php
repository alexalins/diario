<!DOCTYPE html>
<html>
<head>
    <title>Diario</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body style="background-color: #696969">    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6"  style="left: 350px; top: 150px">
                    <div class="jumbotron">
                        <p>
                            <div class="row">
                                <div class="col-md-12">
                                  <?php
                                // session_start inicia a sessão
                                  session_start();
                                  include("conexao.php"); 
                                  $db = mysqli_connect('localhost', 'root','', 'diario');

                                  $login = $_POST['login'];
                                  $senha = $_POST['senha'];
                                  $result = mysqli_query($db, "SELECT * FROM usuario where login='$login' and senha='$senha'");
                                  if(mysqli_affected_rows($db) == 1){ 
                                    $_SESSION['login'] = $login;
                                    $_SESSION['senha'] = $senha;
                                    Header("location:home.php");                                                              
                                }
                                else{
                                    echo '<div class="alert alert-danger">
                                    <strong>Error!</strong> Não foi possivel efetuar o login!
                                    <a href="login.php"><button type="button" class="btn btn-danger">ok</button>
                                    </div>';
                                    unset ($_SESSION['login']);
                                    unset ($_SESSION['senha']);                             
                                }

                                mysqli_close($db);
                                ?>  
                            </div>
                        </div>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
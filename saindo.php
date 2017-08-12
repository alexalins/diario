<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
  {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
  }
  $logado = $_SESSION['login'];
  ?>

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
                  if(session_destroy()){
                    echo '<div class="alert alert-success">
                    <strong>Sucesso!</strong> Sessão encerrada com sucesso!
                    <a href="login.php"><button type="button" class="btn btn-primary">ok</button>
                    </div>';
                  }
                  else{
                    echo '<div class="alert alert-success">
                    <strong>Erro!</strong> A sessão nao foi finalizado corretamente!
                    <a href="home.php"><button type="button" class="btn btn-primary">ok</button>
                    </div>';
                  }
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
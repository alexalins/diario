<!DOCTYPE html>
<html>
<head>

	<?php
		//controle de sessão
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:login.php');
	}

	$logado = $_SESSION['login'];
	$id = $_GET['id'];
	include("conexao.php");
	?>

	<title>Diario</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body style="background-color: #696969">	
	<div class="container-fluid">

		<!--menu-->
		<div class="row">
			<nav class="navbar navbar-default navbar-inverse" role="navigation">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="saindo.php">Sair  <span class="glyphicon glyphicon-log-out"></span></a>
						</li>
					</ul>
				</div>
			</nav>
		</div>

		<div class="col-md-12">

			<div class="col-md-6"  style="left: 350px; top: 150px">
				<div class="jumbotron">

					<form action="atualizando.php" method="post" name="partida">
						<div class="login-form">

							<?php
							$db = mysqli_connect('localhost', 'root','', 'diario');
							$textos = $db->query("SELECT * from texto where id='$id'");
							if($textos){
								while ($texto = $textos->fetch_assoc()){
									?> 

									<div style="visibility: hidden;">
										<input type="text"  name="id" class="form-control" value=<?=$texto['id']?> readonly>
									</div>

									<div class="form-group">
										<textarea class="form-control"  name="titulo" required><?php echo $texto['titulo'];?></textarea>
									</div>

									<div class="form-group">
										<textarea class="form-control"  name="txt" required><?php echo $texto['txt'];?></textarea>
									</div>



									<div class="button_form">
										<a href="home.php"><input type="button" class="btn btn-danger" value="cancelar"></a>
										<button type="submit" class="btn btn-success">Atualizar</button>
									</div>    

									<?php         
								}
								$textos->free(); 
							}
							?>  

						</div><!--/.login-form-->          
					</form>

				</div>
			</div>

		</div>
		
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>

	<?php
		//controle de sessão
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha_']);
		header('location:login.php');
	}

	$logado = $_SESSION['login'];
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

					<form action="salvando.php" method="post">
						<div class="login-form">
							<div class="form-group">
								<label>Titulo</label>
								<input type="name" name="titulo" class="form-control"/>
								<br>
								<label>Escreva aqui:</label>
								<textarea class="form-control"  name="txt" required></textarea>
							</div>

							<div class="button_form">                              
								<button type="submit" class="btn btn-success btn-block">Salvar  <span class="glyphicon glyphicon-floppy-disk"></span></button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
		
	</div>
</body>
</html>
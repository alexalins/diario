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

					<?php
					$db = mysqli_connect('localhost', 'root','', 'diario');

					$txt = $_POST['txt'];
					$titulo = $_POST['titulo'];

					$sql ="INSERT INTO texto (titulo, txt) values ('$titulo', '$txt')";
					$result = mysqli_query( $db, $sql);
					if(!$result)
						echo '<div class="alert alert-danger">
					<strong>Error!</strong>Não foi possivel salvar!
					<a href="escrevendo.php"><button type="button" class="btn btn-danger">ok</button>
					</div>';
					else
					{                              
						echo '<div class="alert alert-success">
						<strong>Sucesso!</strong>Salvo com sucesso!
						<a href="home.php"><button type="button" class="btn btn-primary">ok</button>
						</div>';

					}

					mysqli_close($db);                            
					?>      

				</div>
			</div>

		</div>
		
	</div>
</body>
</html>
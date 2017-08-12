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

			<div class="col-md-6"  style="left: 350px;">
				<div class="jumbotron">
					<!-- botão de escrever-->
					<div>
						<a href="">
							<a class="btn btn-success btn-block" href="escrevendo.php">Escrever  <span class="glyphicon glyphicon-pencil"></span></a>
						</a>
					</div>

					<br><br>
					<?php
					$db = mysqli_connect('localhost', 'root','', 'diario');

					$textos = $db->query("SELECT * from texto order by id desc");
					if(mysqli_affected_rows($db) > 0){
						while ($texto = $textos->fetch_assoc()){
							?> 

							<!--lista-->
							<div class="list-group">

								<div class="list-group-item">
									<h4 class="list-group-item-heading"><?php echo $texto['titulo']; ?></h4>
									<!--opções-->
									<a href="editando.php?id=<?=$texto['id']?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="excluir.php?id=<?=$texto['id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="lendo.php?id=<?=$texto['id']?>" class="btn btn-info"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
								</div>

							</div>

							<?php         
						}
						$textos->free(); 
					}
					else{
						echo "<h4 class='sem_registros'>Vazio!</h4>";
					}

					?>
				</div>
			</div>

		</div>

	</div>
</body>
<?mysqli_close($db);?>
</html>
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
									<form role="form" action="validarUsuario.php" method="post">
										<div class="form-group">
											<label>
												Login
											</label>
											<input type="name" name="login" class="form-control"/>
										</div>
										<div class="form-group">
											<label>
												Senha
											</label>
											<input type="password" name="senha" class="form-control" />
										</div>
										<div class="form-group log-status">
											<button type="submit" class="btn btn-success btn-block">Entrar <span class="glyphicon glyphicon-chevron-right"></span></button>               
										</div>
									</form>
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
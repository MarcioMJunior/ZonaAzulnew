<!DOCTYPE html>
<html>
	<head>
		<?php $user = $_COOKIE['user'];?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Painel admin</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body class="adm">
		<img src="../img/adm_cabecalho.png" class="img-responsive">
		<div class="clearmin"></div>
		
		<div class="margem-adm">	
			<div class="row">
				<div class="col-md-2">
					<div class="block">
						<div class="clear5"></div>
						<div class="clear5"></div>
						<div class="clear5"></div>
						<div class="clear5"></div>
					</div>
					<div class="menus">
						<a href="cadastroMatriz.php"><h4><span class="glyphicon glyphicon-briefcase"></span> Cadastro de Empresa</h4></a>
						<a href="cadastroCidade.php"><h4><span class="glyphicon glyphicon-pushpin"></span> Cadastro de Cidade</h4></a>
						<div class="clear"></div>
						<h4><span class="glyphicon glyphicon-user"></span> Usuário</h4></a>
						<h4><span class="glyphicon glyphicon-minus"></span> <?php echo $user; ?></h4>
						<div class="clear"></div>
						<a href="../login.html"><h4><span class="glyphicon glyphicon-off"></span> Sair</h4></a>
					</div>
				</div>
				<div class="col-md-10">
					<div class="painel-controle">	
					<div class="panel panel-primary">
						<div class="panel-heading">
							Cadastro de Cidade
						</div>
						<div class="panel-body">
								<div class="controle-form">
									<form method="post" action="cadastroCidadeconf.php">
										<div class="row">
											<div class="col-md-6">
												Nome da Cidade: <div class="clearmin"></div>
												<input type="text" name="cidade" class="form-control">	
											</div>
											<div class="col-md-6">
												UF: <div class="clearmin"></div>
												<input type="text" name="uf" class="form-control">	
											</div>
										</div>
										<div class="clear"></div>
										<div align="right">
											<input type="submit" value="Cadastrar Cidade" class="btn btn-primary">
										</div>
									</form>
								</div>
						</div>
						<div class="panel-footer">
							<div class="clear"></div>
						</div>
					</div>
					</div>

				</div>			
			</div>
		</div>
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			$user = $_COOKIE['user'];
			$id = $_COOKIE['id'];

			include 'conexao.php';

			$sql = "SELECT * FROM `pontos_venda` WHERE `ID` = '$id'";
			$query = $mysqli->query($sql);

			while($dados = $query->fetch_array()){
				$idUnidade = $dados['ID_UNIDADE'];
			}
		?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Painel Ponto Venda</title>
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
						<a href="cadastro_usuario.php"><h4><span class="glyphicon glyphicon-plus"></span> Cadastro novo Usuário</h4></a>
						<a href="recarga_usuario.php"><h4><span class="glyphicon glyphicon-usd"></span> Recarga para Usuário</h4></a>
						<a href="venda_ticket.php"><h4><span class="glyphicon glyphicon-list-alt"></span> Venda de Ticket</h4></a>
						<div class="clear"></div>
						<h4><span class="glyphicon glyphicon-user"></span> Usuário</h4></a>
						<h4><span class="glyphicon glyphicon-minus"></span> <?php echo $user; ?></h4>
						<div class="clear"></div>
						<a href="../ponto_venda.html"><h4><span class="glyphicon glyphicon-off"></span> Sair</h4></a>
					</div>
				</div>
				<div class="col-md-10">
				<div class="painel-controle">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Cadastro de usuario
						</div>
						<div class="panel-body">
							<div class="controle-form">
								<form action="cadastrousuarioconf.php" method="post">
									<input type="hidden" name="idUnidade" value="<?php echo $idUnidade;?>">
									<div class="row">
										<div class="col-md-4">
											Nome: <div class="clearmin"></div>
											<input type="text" name="nome" class="form-control">
										</div>
										<div class="col-md-4">
											CPF: <div class="clearmin"></div>
											<input type="text" name="cpf" class="form-control" placeholder="somente numeros">
										</div>
										<div class="col-md-4">
											Saldo: <div class="clearmin"></div>
											<input type="text" name="saldo" class="form-control">
										</div>
									</div>	
									<div class="clear"></div>
									<div align="right">
										<input type="submit" class="btn btn-primary" value="Cadastrar">
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
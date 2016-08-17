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
						<a href="cadastro_parametro.php"><h4><span class="glyphicon glyphicon-wrench"></span> Cadastro de Parâmetros</h4></a>
						<a href="tempoVenda.php"><h4><span class="glyphicon glyphicon-expand"></span> Tempo para venda</h4></a>
						<a href="cadastro_rua.php"><h4><span class="glyphicon glyphicon-pushpin"></span> Cadastro de Ruas</h4></a>
						<a href="cadastro_vaga.php"><h4><span class="glyphicon glyphicon-road"></span> Cadastro de Vagas</h4></a>
						<a href="cadastro_equipamento.php"><h4><span class="glyphicon glyphicon-phone"></span> Cadastro de Equipamentos</h4></a>
						<a href="cadastro_orientadora.php"><h4><span class="glyphicon glyphicon-copy"></span> Cadastro de Orientadoras</h4></a>
						<a href="cadastro_ponto.php"><h4><span class="glyphicon glyphicon-briefcase"></span> Cadastro Ponto de venda</h4></a>
						<div class="clear"></div>
						<h4><span class="glyphicon glyphicon-user"></span> Usuário</h4></a>
						<h4><span class="glyphicon glyphicon-minus"></span> <?php echo $user; ?></h4>
						<div class="clear"></div>
						<a href="../loginUnidade.html"><h4><span class="glyphicon glyphicon-off"></span> Sair</h4></a>
					</div>
				</div>
				<div class="col-md-10">
				<div class="painel-controle">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="clear"></div>
						</div>
						<div class="panel-body">
							<div class="clearmin"></div>
								<h1>Bem vindo ao Painel Administrativo</h1>
								<h2>Escolha uma opção ao lado</h2>
							<div class="clearmin"></div>
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
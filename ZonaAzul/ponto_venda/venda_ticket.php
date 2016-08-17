<!DOCTYPE html>
<html>
	<head>
		<?php 
			$user = $_COOKIE['user'];
			$id = $_COOKIE['id'];

			include 'conexao.php';

			//busca o id da unidade
			$sql = "SELECT * FROM `pontos_venda` WHERE `ID` = '$id'";
			$query = $mysqli->query($sql);

			while($dados = $query->fetch_array()){
				$idUnidade = $dados['ID_UNIDADE'];
			}

			// busca o valor do minuto na tabela de parametros pelo id da unidade
			$busca = "SELECT `cobranca_minuto`,`cobranca_hora`,`preco_minuto` FROM `parametros_funcionamento` WHERE `ID_UNIDADE` = '$idUnidade'";
			$bus = $mysqli->query($busca);
			
			while($dados2 = $bus->fetch_array()){
				$cobranca_minuto = $dados2['cobranca_minuto'];
				$cobranca_hora = $dados2['cobranca_hora'];
				$preco_minuto = $dados2['preco_minuto'];
			}
			
			if ($cobranca_minuto == 1) {
				// multiplica o valor do tempo pelo tempo desejado
				$p30 = $preco_minuto * 30;
				$p60 = $preco_minuto * 60;
				$p120 = $preco_minuto * 120;
				$p180 = $preco_minuto * 180;
			}
			elseif($cobranca_hora == 1){
				// calcula o valor de cada minuto
				$real_preco_minuto = $preco_minuto / 60;
				
				// multiplica o valor do tempo pelo tempo desejado
				$p30 = $real_preco_minuto * 30;
				$p60 = $real_preco_minuto * 60;
				$p120 = $real_preco_minuto * 120;
				$p180 = $real_preco_minuto * 180;	
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
							Venda de ticket
						</div>
						<div class="panel-body">
							<div class="controle-form">
								<div class="row">
									<div class="col-md-7">
										<form action="vendaticketconf.php" method="post">
											<input type="hidden" name="idUnidade" value="<?php echo $idUnidade;?>">
											<input type="hidden" name="id" value="<?php echo $id;?>">
											Selecione o tempo do ticket: <div class="clearmin"></div>
											<select class="form-control" name="ticket">
												<option value="<?php echo $p30; ?>">30 minutos</option>
												<option value="<?php echo $p60; ?>">60 minutos</option>
												<option value="<?php echo $p120; ?>">120 minutos</option>
												<option value="<?php echo $p180; ?>">180 minutos</option>
											</select>
											<div class="clear"></div>
											<div align="right">
												<input type="submit" class="btn btn-primary" value="Vender ticket">
											</div>
										</form>
									</div>
									<div class="col-md-5">
										<div class="tabela">
											<h3>Tabela de preços</h3>
											<div class="clearmin"></div>
											<h4>30 min = R$ <?php echo $p30; ?></h4>
											<h4>60 min = R$ <?php echo $p60; ?></h4>
											<h4>120 min = R$ <?php echo $p120; ?></h4>
											<h4>180 min = R$ <?php echo $p180; ?></h4>
										</div>
									</div>
								</div>
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
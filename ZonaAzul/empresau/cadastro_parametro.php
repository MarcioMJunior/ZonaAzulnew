<!DOCTYPE html>
<html>
	<head>
		<?php 
			$user = $_COOKIE['user'];
			$id = $_COOKIE['id'];

			include 'conexao.php';
			$sql = "SELECT * FROM `parametros_funcionamento` WHERE `ID_UNIDADE` = '$id'";
			$query = $mysqli->query($sql);

			$contagem = $query->num_rows;

			if ($contagem >= 1) {
				$cadastro = 1;
			}
			else{
				$cadastro = 0;
			}
		?>
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
							Cadastro de Parâmetros
						</div>
						<div class="panel-body">
							<div class="controle-form">
								<form action="cadastroParametrosconf.php" method="post">
									<?php
										if ($cadastro == 1) {
											
											while ($dados = $query->fetch_array()) {
									?>
									<input type="hidden" name="idUnidade" value="<?php echo $id;?>">
									<input type="hidden" name="cadastro" value="<?php echo $cadastro;?>"> 
									<div class="row">
										<div class="col-md-3">
											Horario de inicio na semana: <div class="clearmin"></div>
											<input type="time" name="inicioSemana" class="form-control" value="<?php echo $dados['horario_inicio_semana'];?>">
										</div>
										<div class="col-md-3">
											Horario de fim na semana: <div class="clearmin"></div>
											<input type="time" name="fimSemana" class="form-control" value="<?php echo $dados['horario_fim_semana'];?>">
										</div>
										<div class="col-md-3">
											Horario de inicio no sabado: <div class="clearmin"></div>
											<input type="time" name="inicioSabado" class="form-control" value="<?php echo $dados['horario_inicio_sabado'];?>">
										</div>
										<div class="col-md-3">
											Horario de fim no sabado: <div class="clearmin"></div>
											<input type="time" name="fimSabado" class="form-control" value="<?php echo $dados['horario_fim_sabado'];?>">
										</div>
									</div>
									<div class="clearmin"></div>
									
									<div class="row">
										<div class="col-md-6">
											Tipo de cobranca por:
											<select name="tipo" class="form-control">
												<option value="1">Minuto</option>
												<option value="0">Hora</option>
											</select>
										</div>
										<div class="col-md-6">
											Preço do minuto/hora: <div class="clearmin"></div>
											<input type="text" name="precoMinuto" class="form-control" value="<?php echo $dados['preco_minuto'];?>"> 
										</div>
									</div>
									<div class="clearmin"></div>

									<div class="row">
										<div class="col-md-6">
											Tempo de toque minimo: <div class="clearmin"></div>
											<input type="number" name="tempoMinimo" class="form-control" value="<?php echo $dados['tempo_toque_minimo'];?>">
										</div>
										<div class="col-md-6">
											Percentual de repasse: <div class="clearmin"></div>
											<input type="text" name="repasse" class="form-control" value="<?php echo $dados['percentual_repasse'];?>">
										</div>
									</div>
									<?php 
										}
									?>
									<div class="clear"></div>
									<div align="right">
										<input type="submit" value="Cadastrar" class="btn btn-primary">
									</div>
								</form>
								<?php
									}
									elseif($cadastro == 0){
								?>
									<form action="cadastroParametrosconf.php" method="post">
									
									<input type="hidden" name="idUnidade" value="<?php echo $id;?>">
									<input type="hidden" name="cadastro" value="<?php echo $cadastro;?>"> 
									<div class="row">
										<div class="col-md-3">
											Horario de inicio na semana: <div class="clearmin"></div>
											<input type="time" name="inicioSemana" class="form-control">
										</div>
										<div class="col-md-3">
											Horario de fim na semana: <div class="clearmin"></div>
											<input type="time" name="fimSemana" class="form-control">
										</div>
										<div class="col-md-3">
											Horario de inicio no sabado: <div class="clearmin"></div>
											<input type="time" name="inicioSabado" class="form-control">
										</div>
										<div class="col-md-3">
											Horario de fim no sabado: <div class="clearmin"></div>
											<input type="time" name="fimSabado" class="form-control">
										</div>
									</div>
									<div class="clearmin"></div>
									
									<div class="row">
										<div class="col-md-6">
											Tipo de cobranca por:
											<select name="tipo" class="form-control">
												<option value="1">Minuto</option>
												<option value="0">Hora</option>
											</select>
										</div>
										<div class="col-md-6">
											Preço do minuto/hora: <div class="clearmin"></div>
											<input type="text" name="precoMinuto" class="form-control"> 
										</div>
									</div>
									<div class="clearmin"></div>

									<div class="row">
										<div class="col-md-6">
											Tempo de toque minimo: <div class="clearmin"></div>
											<input type="number" name="tempoMinimo" class="form-control">
										</div>
										<div class="col-md-6">
											Percentual de repasse: <div class="clearmin"></div>
											<input type="text" name="repasse" class="form-control">
										</div>
									</div>
								
									<div class="clear"></div>
									<div align="right">
										<input type="submit" value="Enviar" class="btn btn-primary">
									</div>
								</form>
								<?php
									}
								?>
							</div>
						</div>
						<div class="panel-footer">
							<div class="clear"></div>
						</div>
					</div>
				</div>
				</div>			
			</div>
			<div class="clear2"></div>
		</div>
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
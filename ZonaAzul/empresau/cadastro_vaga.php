<!DOCTYPE html>
<html>
	<head>
		<?php 
			$user = $_COOKIE['user'];
			$id = $_COOKIE['id'];
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
							Cadastro de vaga
						</div>
						<div class="panel-body">
							<div class="controle-form">
								<form action="cadastrovagasconf.php" method="post">
									<input type="hidden" name="idUnidade" value="<?php echo $id;?>">
									<div class="row">
										<div class="col-md-6">
											Numero da vaga: <div class="clearmin"></div>
											<input type="number" name="numero" class="form-control">
										</div>
										<div class="col-md-6">
											Rua: <div class="clearmin"></div>
											<!--Lista todas as ruas cadastradas pela unidade-->
											<select name="idRua" class="form-control">	
											<?php
												include 'conexao.php';

												$sql = "SELECT * FROM `ruas` WHERE `ID_UNIDADE` = '$id'";
												$query = $mysqli->query($sql);

												while ($dados = $query->fetch_array()) {
											?>
												<option value="<?php echo $dados['ID'];?>"><?php echo $dados['nome']?></option>
											<?php
												}
											?>
											</select>
											<!--Termina a listagem-->
										</div>
									</div>
									<div class="clear"></div>
									<div align="right">
										<input type="submit" class="btn btn-primary" value="Cadastrar">
									</div>
								</form>
								<div class="clear"></div>
								<div class="table-responsive">
									<table border="1" class="table table-hover">
										<thead>
											<tr>
												<th>Número da vaga</th>
												<th>Nome da Rua</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$consulta = "SELECT vagas_ruas.numero_vaga, ruas.nome FROM vagas_ruas INNER JOIN ruas ON vagas_ruas.ID_RUA = ruas.ID WHERE ruas.ID_UNIDADE = '$id' ORDER BY vagas_ruas.numero_vaga";
												$busca = $mysqli->query($consulta);

												while ($dados = $busca->fetch_array()) {
											?>
											<tr>
												<td><?php echo $dados['numero_vaga'];?></td>
												<td><?php echo $dados['nome'];?></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
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
			<div class="clear2"></div>
		</div>
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
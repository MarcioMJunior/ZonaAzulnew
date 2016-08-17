<!DOCTYPE html>
<html>
	<head>
		<?php 
			$user = $_COOKIE['user'];
			$id = $_COOKIE['id'];

			include 'conexao.php';
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
							Cadastro de Pontos de Venda
						</div>
						<div class="panel-body">
							<div class="controle-form">
								<form action="cadastropontoconf.php" method="post">
									<input type="hidden" name="idUnidade" value="<?php echo $id;?>">
									Nome do ponto de venda: <div class="clearmin"></div>
									<input type="text" name="nome" class="form-control">
									<div class="clearmin"></div>
									<div class="row">
										<div class="col-md-4">
											Rua: <div class="clearmin"></div>
											<select name="rua" class="form-control">
											<?php
												$sql = "SELECT * FROM `ruas` WHERE `ID_UNIDADE` = '$id'";
												$query = $mysqli->query($sql);

												while ($dados = $query->fetch_array()) {
											?>
												<option value="<?php echo $dados['ID']?>"><?php echo $dados['nome']?></option>
											<?php
												}
											?>
											</select>
										</div>
										<div class="col-md-4">
											Equipamento: <div class="clearmin"></div>
											<select name="equipamento" class="form-control">
												<?php
													$sql2 = "SELECT * FROM `equipamentos_unidade` WHERE `ID_UNIDADE` = '$id'";
													$query2 = $mysqli->query($sql2);

													while ($dados2 = $query2->fetch_array()){
												?>
													<option value="<?php echo $dados2['ID']?>"><?php echo $dados2['identificacao']?></option>
												<?php
													}
												?>
											</select>
										</div>
										<div class="col-md-4">
											Saldo Atual: <div class="clearmin"></div>
											<input type="text" name="saldo" class="form-control">
										</div>
									</div>
									<div class="clearmin"></div>
									<div class="row">
										<div class="col-md-6">
											Login para acesso: <div class="clearmin"></div>
											<input type="text" name="login" class="form-control">
										</div>
										<div class="col-md-6">
											Senha para acesso: <div class="clearmin"></div>
											<input type="password" name="senha" class="form-control">
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
												<th>Nome do Ponto</th>
												<th>Login</th>
												<th>Rua</th>
												<th>Equipamento</th>
												<th>Saldo</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$consulta = "SELECT pontos_venda.nome_ponto, pontos_venda.login ,ruas.nome, equipamentos_unidade.identificacao, pontos_venda.saldo_atual FROM pontos_venda INNER JOIN ruas ON pontos_venda.ID_RUA = ruas.ID INNER JOIN equipamentos_unidade ON pontos_venda.ID_EQUIPAMENTO = equipamentos_unidade.ID WHERE ruas.ID_UNIDADE = '$id'";
												$busca = $mysqli->query($consulta);

												while ($dados = $busca->fetch_array()) {
											?>
											<tr>
												<td><?php echo $dados['nome_ponto'];?></td>
												<td><?php echo $dados['login'];?></td>
												<td><?php echo $dados['nome'];?></td>
												<td><?php echo $dados['identificacao'];?></td>
												<td><?php echo $dados['saldo_atual'];?></td>
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
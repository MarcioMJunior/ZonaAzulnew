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
						<a href="cadastroUnidade.php"><h4><span class="glyphicon glyphicon-briefcase"></span> Cadastro de Unidade</h4></a>
						<div class="clear"></div>
						<h4><span class="glyphicon glyphicon-user"></span> Usuário</h4></a>
						<h4><span class="glyphicon glyphicon-minus"></span> <?php echo $user; ?></h4>
						<div class="clear"></div>
						<a href="../loginMatriz.html"><h4><span class="glyphicon glyphicon-off"></span> Sair</h4></a>
					</div>
				</div>
				<div class="col-md-10">
					<div class="painel-controle">	
					<div class="panel panel-primary">
						<div class="panel-heading">
							Cadastro de Unidade
						</div>
						<div class="panel-body">
								<div class="controle-form">
									<form method="post" action="cadastroUnidadeconf.php">
										<input type="hidden" name="idMatriz" value="<?php echo $id;?>">
										<div class="row">
											<div class="col-md-6">
												Nome da Empresa: <div class="clearmin"></div>
												<input type="text" name="nome" class="form-control" required>
											</div>
											<div class="col-md-6">
												Nome Fantasia: <div class="clearmin"></div>
												<input type="text" name="nomefantasia" class="form-control" required>
											</div>
										</div>
										<div class="clearmin"></div>
										
										<div class="row">
											<div class="col-md-4">
												CNPJ: <div class="clearmin"></div>
												<input type="text" name="cnpj" class="form-control" required>
												<div class="clearmin"></div>
											</div>
											<div class="col-md-4">
												Inscrição Estadual: <div class="clearmin"></div>
												<input type="text" name="insc" class="form-control" required>
												<div class="clearmin"></div>
											</div>
											<div class="col-md-4">
												Cidade: <div class="clearmin"></div>
												<select name="idcidade" class="form-control">
												<?php 
													include 'conexao.php';
													
													$sql = "SELECT * FROM `cidades`";
													$query = $mysqli->query($sql);

													while($dados = $query->fetch_array()){
												?>
													<option value="<?php echo $dados['ID'];?>"><?php echo $dados['nome_cidade']. " -- " . $dados['UF']; ?></option>
												<?php
													}
												?>
												</select>
											</div>	
										</div>
										<div class="clearmin"></div>
										
										<div class="row">
											<div class="col-md-4">
												Telefone: <div class="clearmin"></div>
												<input type="text" name="telefone" class="form-control" required>
											</div>
											<div class="col-md-8">
												Endereço: <div class="clearmin"></div>
												<textarea class="form-control" name="endereco" required></textarea>
											</div>
										</div>
										<div class="clearmin"></div>

										<div class="row">
											<div class="col-md-4">
												Responsável:
												<input type="text" name="responsavel" class="form-control" required>
											</div>
											<div class="col-md-4">
												Email:
												<input type="email" name="email" class="form-control" required>
											</div>
											<div class="col-md-4">
												Telefone para contato:
												<input type="text" name="telefonecontato" class="form-control" required>
											</div>
										</div>
										<div class="clearmin"></div>
										<div class="row">
											<div class="col-md-4">
												Responsável 2:
												<input type="text" name="responsavel2" class="form-control" required>
											</div>
											<div class="col-md-4">
												Email:
												<input type="email" name="email2" class="form-control" required>
											</div>
											<div class="col-md-4">
												Telefone para contato:
												<input type="text" name="telefonecontato2" class="form-control" required>
											</div>
										</div>
										<div class="clearmin"></div>
										<div class="row">
											<div class="col-md-4">
												Login: <div class="clearmin"></div>
												<input type="text" name="login" class="form-control" placeholder="Login de acesso para empresa criada" required>
											</div>
											<div class="col-md-4">
												Senha: <div class="clearmin"></div>
												<input type="password" name="senha" class="form-control" placeholder="Senha de acesso para empresa criada" required>
											</div>
											<div class="col-md-4">
												Confirmar senha: <div class="clearmin"></div>
												<input type="password" name="confsenha" class="form-control" placeholder="Confirme a senha" required>
											</div>
										</div>
										<div class="clear"></div>
										<div align="right">
											<input type="submit" value="Cadastrar" class="btn btn-primary">
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
			<div class="clear3"></div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
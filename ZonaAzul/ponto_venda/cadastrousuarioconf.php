<?php 
	$id = $_COOKIE['id'];
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$saldo = $_POST['saldo'];
	$idUnidade = $_POST['idUnidade'];

	$data = date('Y / m / d');

	include 'conexao.php';

	// verifica de o cpf ja existe na tabela
	$consulta = "SELECT * FROM `usuarios_zona_azul` WHERE `CPF` = '$cpf'";
	$exe = $mysqli->query($consulta);

	// conta a quantidade de linhas que a consulta gerou
	$cont = $exe->num_rows;

	if ($cont >= 1) {
		echo "<script>
			alert('este CPF ja foi cadastrado');
			window.history.go(-1);
		</script>";
	}
	else{
		// cadastro na tabela de usuarios
		$cadastro = "INSERT INTO `usuarios_zona_azul`(`ID_UNIDADE`,`data_cadastro`,`CPF`,`nome_usuario`,`saldo`) VALUES ('$idUnidade','$data','$cpf','$nome','$saldo')";

		// busca o valor de repasse na tabela de parametros
		$repasse = "SELECT `percentual_repasse` FROM `parametros_funcionamento` WHERE `ID_UNIDADE` = '$idUnidade'";
		$rep = $mysqli->query($repasse);

		//pega o valor de repasse
		while ($dados = $rep->fetch_array()) {
			$percentual = $dados['percentual_repasse'];
		}

		//calcula o valor de repasse
		$repasseUnidade = $saldo * $percentual;

		// cadastro na tabela de transacoes
		$transacao = "INSERT INTO `transacao_ponto_venda`(`ID_PONTOVENDA`, `data_hora`,`tipo_transacao`,`valor`,`valor_repasse`) VALUES ('$id','$data','CPF','$saldo','$repasseUnidade')";

		$cad = $mysqli->query($cadastro);
		$tra = $mysqli->query($transacao);

		if ($cad && $tra) {
			echo "<script>
				alert('Cadastro com sucesso');
				location.href='cadastro_usuario.php';
			</script>";		
		}
		else{
			echo "<script>
				alert('Ocorreu um erro, tente novamente');
				location.href='cadastro_usuario.php';
			</script>";
		}
	}
?>
<?php
	include 'conexao.php';

	$id = $_COOKIE['id'];
	$idUnidade = $_POST['idUnidade'];
	$data = date('Y / m / d');

	$cpf = $_POST['cpf'];
	$recarga = $_POST['recarga'];

	//verifica se o cpf digitado existe
	$verifica = "SELECT * FROM `usuarios_zona_azul` WHERE `CPF` = '$cpf'";
	$exe = $mysqli->query($verifica);

	// conta a quantidade de linhas que a consulta gerou
	$cont = $exe->num_rows;

	if ($cont >= 1) {
		//busca o valor de saldo antigo
		$buscaAntigo = "SELECT `saldo` FROM `usuarios_zona_azul` WHERE `CPF` = '$cpf'";
		$exe2 = $mysqli->query($buscaAntigo);

		//recebe o saldo antigo
		while ($dados = $exe2->fetch_array()) {
			$valorAntigo = $dados['saldo'];
		}

		// recebe o valor antigo e soma com o valor da recarga
		$total = $valorAntigo + $recarga;

		// altera o valor de saldo
		$altera = "UPDATE `usuarios_zona_azul` SET `saldo` = '$total' WHERE `CPF` = '$cpf'";

		// busca o valor de repasse na tabela de parametros
		$repasse = "SELECT `percentual_repasse` FROM `parametros_funcionamento` WHERE `ID_UNIDADE` = '$idUnidade'";
		$rep = $mysqli->query($repasse);

		//pega o valor de repasse
		while ($dados = $rep->fetch_array()) {
			$percentual = $dados['percentual_repasse'];
		}

		//calcula o valor de repasse
		$repasseUnidade = $recarga * $percentual;

		//insere na tabela de transacoes
		$transacao = "INSERT INTO `transacao_ponto_venda`(`ID_PONTOVENDA`, `data_hora`, `tipo_transacao`, `valor`, `valor_repasse`) VALUES ('$id','$data','Recarga de CPF','$recarga','$repasseUnidade')";

		$alt = $mysqli->query($altera);
		$tran = $mysqli->query($transacao);

		if ($alt && $tran) {
			echo "<script>
				alert('Recarga com sucesso');
				location.href='recarga_usuario.php';
			</script>";	
		}
		else{
			echo "<script>
				alert('Ocorreu um erro, tente novamente');
				location.href='recarga_usuario.php';
			</script>";	
		}
		
	}
	else{
		echo "<script>
				alert('CPF inexistente');
				location.href='recarga_usuario.php';
			</script>";	
	}
?>
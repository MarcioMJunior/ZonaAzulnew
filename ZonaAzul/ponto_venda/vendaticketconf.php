<?php 
	$id = $_POST['id'];
	$idUnidade = $_POST['idUnidade'];
	$preco = $_POST['ticket'];
	$data = date('Y / m / d');

	include 'conexao.php';

	// busca o valor de repasse na tabela de parametros
	$repasse = "SELECT `percentual_repasse` FROM `parametros_funcionamento` WHERE `ID_UNIDADE` = '$idUnidade'";
	$rep = $mysqli->query($repasse);

	//pega o valor de repasse
	while ($dados = $rep->fetch_array()) {
		$percentual = $dados['percentual_repasse'];
	}


	//calcula o valor de repasse
	$repasseUnidade = $preco * $percentual;

	// insere o registro na tabela de transacoes
	$sql = "INSERT INTO `transacao_ponto_venda`(`ID_PONTOVENDA`,`data_hora`,`tipo_transacao`, `valor`, `valor_repasse`) VALUES ('$id','$data','Venda de Ticket','$preco', '$repasseUnidade')";
	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
				alert('Venda com sucesso');
				location.href='venda_ticket.php';
			</script>";
	}
	else{
		echo "<script>
				alert('Ocorreu um erro, tente novamente');
				location.href='venda_ticket.php';
			</script>";
	}
?>
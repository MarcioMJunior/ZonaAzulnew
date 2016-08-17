<?php 
	$idUnidade = $_POST['idUnidade'];
	$nome = $_POST['nome'];
	$rua = $_POST['rua'];
	$equipamento = $_POST['equipamento'];
	$saldo = $_POST['saldo'];
	$email = $_POST['login'];
	$senha = $_POST['senha'];

	include 'conexao.php';

	$sql = "INSERT INTO `pontos_venda`(`ID_RUA`, `ID_EQUIPAMENTO`, `ID_UNIDADE`,`nome_ponto`, `saldo_atual`, `login`, `senha`) VALUES ('$rua','$equipamento','$idUnidade','$nome','$saldo','$email','$senha')";
	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
			alert('Cadastro com sucesso');
			location.href='cadastro_ponto.php';
		</script>";
	}
	else{
		echo "<script>
			alert('Ocorreu um erro, tente  novamente');
			location.href='cadastro_ponto.php';
		</script>";
	}

?>
<?php 
	$idUnidade = $_POST['idUnidade'];
	$nome = $_POST['nome'];
	$equipamento = $_POST['equipamento'];
	$saldo = $_POST['saldo'];

	include 'conexao.php';

	$sql = "INSERT INTO `orientadoras`(`ID_UNIDADE`, `ID_EQUIPAMENTO`, `nome`, `saldo`) VALUES ('$idUnidade','$equipamento','$nome','$saldo')";
	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
			alert('Cadastro com sucesso');
			location.href='cadastro_orientadora.php';
		</script>";
	}
	else{
		echo "<script>
			alert('Ocorreu um erro, tente  novamente');
			location.href='cadastro_orientadora.php';
		</script>";
	}
?>
<?php 
	$idUnidade = $_POST['idUnidade'];
	$tipo = $_POST['tipo'];
	$id = $_POST['id'];

	include 'conexao.php';

	$sql = "INSERT INTO `equipamentos_unidade`(`ID_UNIDADE`, `tipo`, `identificacao`) VALUES ('$idUnidade','$tipo','$id')";
	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
			alert('Cadastro com sucesso');
			location.href='cadastro_equipamento.php';
		</script>";
	}
	else{
		echo "<script>
			alert('Ocorreu um erro, tente novamente');
			location.href='cadastro_equipamento.php';
		</script>";
	}
?>
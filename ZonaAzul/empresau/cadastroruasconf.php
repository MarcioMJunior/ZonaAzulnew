<?php 
	$idUnidade = $_POST['idUnidade'];
	$nome = $_POST['nome'];

	include 'conexao.php';

	$sql = "INSERT INTO `ruas`(`ID_UNIDADE`,`nome`) VALUES ('$idUnidade','$nome')";
	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
			alert('Cadastro com sucesso');
			location.href='cadastro_rua.php';
		</script>";
	}
	else{
		echo "<script>
			alert('Ocorreu um erro');
			location.href='cadastro_rua.php';
		</script>";
	}

?>
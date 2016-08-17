<?php 
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];

	include 'conexao.php';

	$sql = "INSERT INTO `cidades`(`nome_cidade`,`UF`) VALUES ('$cidade','$uf')";

	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
			alert('Cadastro com sucesso');
			location.href='cadastroCidade.php';
		</script>";
	}
	else{
		echo "<script>
			alert('Ocorreu um erro, tente novamente');
			location.href='cadastroCidade.php';
		</script>";
	}
?>
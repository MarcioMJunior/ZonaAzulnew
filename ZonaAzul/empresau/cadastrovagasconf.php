<?php 
	$idRua = $_POST['idRua'];
	$numero = $_POST['numero'];

	include 'conexao.php';

	$sql = "INSERT INTO `vagas_ruas`(`ID_RUA`,`numero_vaga`) VALUES ('$idRua','$numero')";
	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
			alert('Cadastro com sucesso');
			location.href='cadastro_vaga.php';
		</script>";
	}
	else{
		echo "<script>
			alert('Ocorreu um erro, tente novamente');
			location.href='cadastro_vaga.php';
		</script>";
	}
?>
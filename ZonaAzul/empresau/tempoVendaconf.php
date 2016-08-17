<?php 
	$minutos = $_POST['minutos'];
	$preco = $_POST['preco'];
	$id_unidade = $_POST['id'];

	include 'conexao.php';

	$sql = "INSERT INTO `tempo_venda`(`minutos`,`preco`,`ID_UNIDADE`) VALUES ('$minutos','$preco','$id_unidade')";

	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
			alert('Cadastro com sucesso');
			location.href='tempoVenda.php';
		</script>";
	}
	else{
		echo "<script>
			alert('Ocorreu um erro, tente novamente');
			location.href='tempoVenda.php';
		</script>";
	}
?>
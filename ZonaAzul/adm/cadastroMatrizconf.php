<?php 
	include 'conexao.php';

	$nome = $_POST['nome'];
	$nomefantasia = $_POST['nomefantasia'];
	
	$cnpj = $_POST['cnpj'];
	$insc = $_POST['insc'];
	
	$telefone = $_POST['telefone'];
	$endereco = $_POST['endereco'];
	
	$responsavel1 = $_POST['responsavel'];
	$email1 = $_POST['email'];
	$telefone1 = $_POST['telefonecontato'];
	
	$responsavel2 = $_POST['responsavel2'];
	$email2 = $_POST['email2'];
	$telefone2 = $_POST['telefonecontato2'];
	
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$sql = "INSERT INTO `matriz`(`nome`, `nome_fantasia`, `CNPJ`, `INSCR_EST`, `telefone`, `endereco`, `responsavel1`, `email1`, `telefone1`, `responsavel2`, `email2`, `telefone2`, `login`, `senha`) VALUES ('$nome','$nomefantasia','$cnpj','$insc','$telefone','$endereco','$responsavel1','$email1','$telefone1','$responsavel2','$email2','$telefone2','$login','$senha')";

	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
			alert('Cadastro com sucesso');
			location.href='cadastroMatriz.php';
		</script>";
	}
	else{
		echo "<script>
			alert('Ocorreu um erro, tente novamente');
			location.href='cadastroMatriz.php';
		</script>";
	}

?>
<?php 
	include 'conexao.php';

	$idMatriz = $_POST['idMatriz'];
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
	$idcidade = $_POST['idcidade'];

	$sql = "INSERT INTO `unidades`(`ID_MATRIZ`, `nome`, `nome_fantasia`, `CNPJ`, `INSCR_EST`,`telefone`, `endereco`, `responsavel1`, `email1`, `telefone1`, `responsavel2`, `email2`, `telefone2`, `login`, `senha`, `ID_CIDADE`) VALUES ('$idMatriz','$nome','$nomefantasia','$cnpj','$insc','$telefone','$endereco','$responsavel1','$email1','$telefone1','$responsavel2','$email2','$telefone2','$login','$senha', '$idcidade')";

	$query = $mysqli->query($sql);

	if ($query) {
		echo "<script>
			alert('Cadastro com sucesso');
			location.href='cadastroUnidade.php';
		</script>";
	}
	else{
		echo "<script>
			alert('Ocorreu um erro, tente novamente');
			location.href='cadastroUnidade.php';
		</script>";
	}

?>
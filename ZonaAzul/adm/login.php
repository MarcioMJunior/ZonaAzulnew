<?php 
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	//conexao com o banco
	include 'conexao.php';

	//consulta se login e senha conferem
	$sql = "SELECT * FROM `administracao` WHERE login = '$login' and senha = '$senha'";
	$query = $mysqli->query($sql);

	//faz a contagem de linhas
	$contagem = $query->num_rows;

	//se a contagem for válida, direciona usuario para painel
	if ($contagem >= 1) {
		session_start();
		while ($dados = $query->fetch_array()) {
			$user = $dados['nome'];
		}
		setcookie('user', $user);
		header('Location: paineladm.php');	
	}
	else{
		echo "<script>
			alert('Usuario ou senha incorretos');
			window.history.go(-1);
		</script>";
	}
?>
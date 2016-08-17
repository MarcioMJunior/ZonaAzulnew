<?php 
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	//conexao com o banco
	include 'conexao.php';

	//consulta se login e senha conferem

	$sql = "SELECT * FROM `pontos_venda` WHERE login = '$login' AND senha = '$senha'";
	$query = $mysqli->query($sql);
	//faz a contagem de linhas
	$contagem = $query->num_rows;

	//se a contagem for válida, direciona usuario para painel
	if ($contagem >= 1) {
		while ($dados = $query->fetch_array()) {
			$user = $dados['nome_ponto'];
			$id = $dados['ID'];
		}
		setcookie('user', $user);
		setcookie('id', $id);
		header('Location: painelPonto.php');	
	}
	else{
		echo "<script>
			alert('Usuario ou senha incorretos');
			window.history.go(-1);
		</script>";
	}
?>
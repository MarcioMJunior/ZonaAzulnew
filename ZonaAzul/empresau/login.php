<?php 
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	//conexao com o banco
	include 'conexao.php';

	//consulta se login e senha conferem
	$sql = "SELECT * FROM `unidades` WHERE login = '$login' AND senha = '$senha'";
	$query = $mysqli->query($sql);

	//faz a contagem de linhas
	$contagem = $query->num_rows;

	//se a contagem for válida, direciona usuario para painel
	if ($contagem >= 1) {
		while ($dados = $query->fetch_array()) {
			$user = $dados['nome'];
			$id = $dados['ID'];
		}
		setcookie('user', $user);
		setcookie('id', $id);
		header('Location: painelUni.php');	
	}
	else{
		echo "<script>
			alert('Usuario ou senha incorretos');
			window.history.go(-1);
		</script>";
	}
?>
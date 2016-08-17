<?php 
	//conexao com o banco
	include 'conexao.php';

	//consulta todos os paramatros
	$sql = "SELECT * FROM `parametros_funcionamento`";
	$query = $mysqli->query($sql);

	//exibe os valores
	while ($dados = $query->fetch_array()) {
  		echo 'ID : ' . $dados['ID'] . '<br>';
  		echo 'ID UNIDADE : ' . $dados['ID_UNIDADE'] . '<br>';
  		echo 'Horario inicio semana : ' . $dados['horario_inicio_semana'] . '<br>';
  		echo 'Horario fim semana : ' . $dados['horario_fim_semana'] . '<br>';
  		echo 'Horario inicio sabado : ' . $dados['horario_inicio_sabado'] . '<br>';
  		echo 'Horario fim sabado : ' . $dados['horario_fim_sabado'] . '<br>';
  		echo 'cobranca por minuto? : ' . $dados['cobranca_minuto'] . '<br>';
  		echo 'cobranca por hora? : ' . $dados['cobranca_hora'] . '<br>';
  		echo 'Preco por minuto : ' . $dados['preco_minuto'] . '<br>';
  		echo 'Tempo de toque minimo : ' . $dados['tempo_toque_minimo'] . '<br>';
  		echo 'Percentual de repasse : ' . $dados['percentual_repasse'] . '<br><br>';
	}

	//conta os registros
	echo 'Registros encontrados: ' . $query->num_rows;
?>
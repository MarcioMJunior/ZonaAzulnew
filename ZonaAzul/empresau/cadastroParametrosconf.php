<?php 
	include 'conexao.php';

	$idUnidade = $_POST['idUnidade'];
	$inicioSemana = $_POST['inicioSemana'];
	$fimSemana = $_POST['fimSemana'];
	$inicioSabado = $_POST['inicioSabado'];
	$fimSabado = $_POST['fimSabado'];
	$precoMinuto = $_POST['precoMinuto'];
	$tempoMinimo = $_POST['tempoMinimo'];
	$repasse = $_POST['repasse'];
	$tipo = $_POST['tipo'];
	$cadastro = $_POST['cadastro'];

	if ($tipo == 1) {
		$hora = 0;
		$minuto = 1;
	}
	elseif($tipo == 0){
		$hora = 1;
		$minuto = 0;
	}

	if ($cadastro == 0) {
		
		$sql = "INSERT INTO `parametros_funcionamento`(`ID_UNIDADE`, `horario_inicio_semana`, `horario_fim_semana`, `horario_inicio_sabado`, `horario_fim_sabado`, `cobranca_minuto`, `cobranca_hora`, `preco_minuto`, `tempo_toque_minimo`, `percentual_repasse`, `cadastrado`) VALUES ('$idUnidade','$inicioSemana','$fimSemana','$inicioSabado','$fimSabado','$minuto','$hora','$precoMinuto','$tempoMinimo','$repasse', '1')";

		$query = $mysqli->query($sql);

		if ($query) {
			echo "<script>
				alert('Cadastro com sucesso');
				location.href='cadastro_parametro.php';
			</script>";
		}
		else{
			echo "<script>
				alert('Ocorreu um erro, tente novamente');
				location.href='cadastro_parametro.php';
			</script>";
		}
	}
	elseif($cadastro == 1){
		$sql = "UPDATE `parametros_funcionamento` SET `horario_inicio_semana`= '$inicioSemana',`horario_fim_semana`= '$fimSemana',`horario_inicio_sabado`= '$inicioSabado',`horario_fim_sabado`= '$fimSabado',`cobranca_minuto`= '$minuto',`cobranca_hora`= '$hora',`preco_minuto`= '$precoMinuto',`tempo_toque_minimo`= '$tempoMinimo',`percentual_repasse`= '$repasse' WHERE `ID_UNIDADE` = '$idUnidade'";

		$query = $mysqli->query($sql);

		if ($query) {
			echo "<script>
				alert('Alteracao com sucesso');
				location.href='cadastro_parametro.php';
			</script>";
		}
		else{
			echo "<script>
				alert('Ocorreu um erro, tente novamente');
				location.href='cadastro_parametro.php';
			</script>";
		}
	}

?>
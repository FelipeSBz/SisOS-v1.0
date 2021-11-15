<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>

		<style type='text/css'>
		.style1 {
			text-align: left;
		}
		</style>
	</head>
	
	<body>
	<?php
		//Verificar Sessão
		session_start();
		
		if (!isset($_SESSION["newsession"]))
			header("Location: ../../page/login/expirou.html");

		//instância
		$db = new PDO("sqlite:../../banco/banco.db");

		$idConsulta = $_GET['id'];

		//visualiza
		foreach ($db->query("SELECT os.id, secretaria.secretaria, setor.setor, nome, telefone, equipamento, patrimonio, relatado, tecnico, constatado, realizado, situacao, criado_em, fechado_em FROM os INNER JOIN setor ON setor.id = os.setor INNER JOIN secretaria ON secretaria.id = setor.id_secretaria WHERE os.id='$idConsulta'") as $row) {
			$secretaria = $row[1];
			$setor = $row[2];
			$funcionario = $row[3];
			$telefone = $row[4];
			$equipamento = $row[5];
			$patrimonio = $row[6];
			$relatado = $row[7];
			$tecnico = $row[8];
			$constatado = $row[9];
			$realizado = $row[10];
			$situacao = $row[11];
			$criado_em = date('d/m/Y',  strtotime($row[12]));
			$fechado_em = date('d/m/Y',  strtotime($row[13]));
		}
	?>            

	<form method='POST' action=''>
	<div align='center'>
		<table width='100%'>
		<tr>
			<td width='10%' bgcolor='#003366'><div align='center'><input type='button' onclick="window.location.href='../../page/relatorio/buscar.html'" value='Voltar'></div></td>
			<td width='80%' bgcolor='#003366'></td>			
			<td width='10%' bgcolor='#003366'><div align='center'><input type='button' value='Imprimir' onClick='window.print()'/></div></td>
		</tr>
		</table>
		
		<?php echo "<p><b>ORDEM DE SERVIÇO Nº $idConsulta - $secretaria</b></p>";?>
		<table width='100%'>
		<tr>			
			<td bgcolor='#CCCCC0'><div align='center'><b>Setor:</b></div></td>
			<td>
				<?php echo "<input type='text' size='42' name='setor' maxlength='42' value='$setor' disabled=''></td>";?>
				
			<td bgcolor='#CCCCC0'><div align='center'><b>Telefone:</b></div></td>
			<td>
				<?php echo "<input type='text' size='42' name='telefone' maxlength='12' value='$telefone' disabled=''></td>";?>
		</tr>

		<tr>	
			<td bgcolor='#CCCCC0'><div align='center'><b>Funcionário:</b></div></td>
			<td>
				<?php echo "<input type='text' size='42' name='nome' maxlength='60' value='$funcionario' disabled=''></td>";?>
				
			<td bgcolor='#CCCCC0'><div align='center'><b>Identificação do Equipamento:</b></div></td>
			<td>
				<?php echo "<input type='text' size='42' name='patrimonio' maxlength='12' value='$patrimonio' disabled=''></td>";?>
		</tr>
	
		<tr>
			<td bgcolor='#CCCCC0'><div align='center'><b>Equipamento:</b></div></td>
			<td>
				<?php echo "<input type='text' size='42' name='equipamento' maxlength='60' value='$equipamento' disabled=''></td>";?>
				
			<td bgcolor='#CCCCC0'><div align='center'><b>Tecnico:</b></div></td>
			<td>
				<?php echo "<input type='text' size='42' name='tecnico' maxlength='12' value='$tecnico' disabled=''></td>";?>
		</tr>

		<tr>
			<td bgcolor='#CCCCC0'><div align='center'><b>Situação:</b></div></td>
			<td>
				<?php echo "<input type='text' size='42' name='situacao' maxlength='20' value='$situacao' disabled=''></td>";?>
				
			<td bgcolor='#CCCCC0'><div align='center'><b>Data de Entrada:</b></div></td>
			<td>
				<?php echo "<input type='text' size='42' name='entrada' maxlength='50' value='$criado_em' disabled=''></td>";?>
		</tr>
	
		<tr>
			<td bgcolor='#CCCCC0'><div align='center'><b>Data Saída:</b></div></td>
			<td>
				<?php echo "<input type='text' size='42' name='saida' maxlength='20' value='$fechado_em' disabled=''></td>";?>						
		</tr>
		</table>
	
		<table width='100%'>
		<tr>
			<td width='10%' bgcolor='#CCCCC0'><div align='center'><b>Problema Informado(s):</b></div></td>
			<td width='90%'>
				<?php echo "<textarea name='relatado' rows='5' cols='59' disabled='' >$relatado</textarea></td>";?>
		</tr>
		<tr>
			<td width='10%' bgcolor='#CCCCC0'><div align='center'><b>Problema constatado(s):</b></div></td>
			<td width='90%'>
				<?php echo "<textarea name='constatado' rows='5' cols='59' disabled=''>$constatado</textarea></td>";?>
		</tr>
		<tr>
			<td width='10%' bgcolor='#CCCCC0'><div align='center'><b>Serviço executado(s):</b></div></td>
			<td width='90%'>
				<?php echo "<textarea name='realizado' rows='5' cols='59' disabled=''>$realizado</textarea></td>";?>
		</tr>
		</table>		
	</div>
	</form>

	<br>
	<p><b><u>Observações:</u></b></p>

	<?php
		foreach ($db->query("select descricao from historico_os where id_os='$idConsulta'") as $row) {
			echo "$row[0]<br>";
		}
	?>
	</body>
</html>
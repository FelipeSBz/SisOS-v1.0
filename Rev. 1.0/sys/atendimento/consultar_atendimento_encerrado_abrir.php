<!DOCTYPE html> 
<html lang="pt-br">
<head>
	<meta charset="utf-8">

	<style type="text/css"> 	
	.style1 {																																																																																													
		text-align: left;
	}
	</style>
</head>
<body>
	<?php
	session_start();
		
	if (isset($_SESSION["newsession"])){
		$NLogin = strtoupper($_SESSION["newsession"]);
	}else
		header("Location: ../../page/login/expirou.html");	
	
	//instância
	$db = new PDO("sqlite:../../banco/banco.db");

	$idConsulta = $_GET['id'];

	//visualiza
	foreach ($db->query("SELECT atendimento.id, secretaria.secretaria, setor.setor, nome, telefone, tipo, tecnico, relatado, realizado, situacao, data_abertura FROM atendimento INNER JOIN setor ON setor.id = atendimento.setor INNER JOIN secretaria ON secretaria.id = setor.id_secretaria WHERE atendimento.id='$idConsulta'") as $row) {
	$secretaria = $row[1];
	$setor = $row[2];
	$funcionario = $row[3];
	$telefone = $row[4];
	$equipamento = $row[5];
	$tecnico = $row[6];	
	$relatado = $row[7];
	$realizado = $row[8];
	$situacao = $row[9];
	$criado_em = date('d/m/Y', strtotime($row[10]));
	}
		
	echo "<form method='POST' action='./atualizar_atendimento.php?id=$idConsulta'>" ?>
		<div align="center">
		<?php echo "<p>ATENDIMENTO Nº $idConsulta</p>"; ?>
			<table width="100%">
				<tr>
					<td width="10%" bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Secretaria:</font></div></td>
					<td width="40%" bgcolor="#CCCCCC">
						<?php echo "<input type='text' size='42' name='secretaria' maxlength='60' value='$secretaria' disabled>"; ?></td>										
					<td width="10%" bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Setor</font></div></td>
					<td width="40%" bgcolor="#CCCCCC">
						<?php echo "<input type='text' size='42' name='setor' maxlength='60' value='$setor' disabled>"; ?></td>
				</tr>

				<tr>
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Funcionário:</font></div></td>
					<td bgcolor="#CCCCCC">
						<?php echo "<input type='text' size='42' name='nome' maxlength='60' value='$funcionario' disabled>"; ?></td>
						
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Telefone ou Ramal:</font></div></td>
					<td bgcolor="#CCCCCC">
						<?php echo "<input type='text' size='42' name='telefone' maxlength='15' value='$telefone' disabled>"; ?></td>						
				</tr>

				<tr>				
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Equipamento:</font></div></td>
					<td bgcolor="#CCCCCC">
						<?php echo "<input type='text' size='42' name='equipamento' maxlength='60' value='$equipamento' disabled>"; ?></td>
						
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Técnico:</font></div></td>
					<td bgcolor="#CCCCCC">
						<?php echo "<input type='text' size='42' name='tecnico' maxlength='60' value='$tecnico' disabled>"; ?></td>
				</tr>
								
				<tr>
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Situação:</font></div></td>
					<td bgcolor="#CCCCCC">
						<?php echo "<input type='text' size='42' name='tecnico' maxlength='60' value='$situacao' disabled>"; ?></td>

					<td bgcolor="#CCCCCC"></td>
					<td bgcolor="#CCCCCC"></td>
				</tr>
			</table>
			
			<table width="100%">
				<tr>
					<td width="10%" bgcolor="#02679C"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Problema Informado(s):</font></div></td>
					<?php echo "<td width='90%' bgcolor='#CCCCCC'><textarea name='relatado' rows='5' cols='59' disabled>$relatado</textarea></td>"; ?>
				</tr>
	
				<tr>
					<td width="10%" bgcolor="#02679C"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">
						Serviço executado(s):</font></div></td>
					<?php echo "<td width='90%' bgcolor='#CCCCCC'><textarea name='realizado' rows='5' cols='59' disabled>$realizado</textarea>"; ?></td>
				</tr>
			</table>

			<table width="100%">
				<tr>
					<td width="10%" bgcolor="#003366"><div align="center"><input type='button' value='Voltar' onClick='history.go(-1)'></div></td>
					<td width="40%" bgcolor="#003366"></td>
					<td width="10%" bgcolor="#003366"><div align="center"><input type="button" value="Imprimir" onClick="window.print()"/></div></td>
					<td width="40%" bgcolor="#003366"></td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
<!DOCTYPE html>
<HTML lang="pt-br">
<HEAD>
	<meta charset="utf-8">
	<title>Lista de Ramais</title>
</HEAD>
<BODY>
	<center><h1>Lista de Ramais</h1></center>
<BR>
<DIV ALIGN=CENTER>
<TABLE BORDER=1>
	<TR VALIGN=top ALIGN=CENTER>
		<TD bgcolor='#FFFCCC' width=40px>
			<b>Nº</b>
		</TD>
		<TD bgcolor='#FFFCCC' width=75px>
			<b>Ramal</b>
		</TD>
		<TD bgcolor='#FFFCCC' width=370px>
			<b>Setor</b>
		</TD>
		<TD bgcolor='#FFFCCC' width=200px>
			<b>Secretaria</b>
		</TD>
	</TR>
	
	<?php

	$NumList = 1;
	//instância
	$db = new PDO("sqlite:../../banco/banco.db");
		foreach ($db->query("SELECT ramal, setor.setor, secretaria.secretaria FROM ramal INNER JOIN setor ON setor.id = ramal.id_setor INNER JOIN secretaria ON secretaria.id = setor.id_secretaria order by setor.setor") as $row) {
	?>
	<tr>
		<td><center><?php print_r($NumList); ?></center></td>
		<td><center><?php print_r($row[0]); ?></center></td>
		<td><?php print_r($row[1]); ?></td>
		<td><center><?php print_r($row[2]); ?></center></td>
	</tr>
		<?php
			$NumList++;
		} ?>
</TABLE>
</DIV>
</BODY>
</HTML>
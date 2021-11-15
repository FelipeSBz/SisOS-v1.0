<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Consultar Atendimentos</title>
    <meta charset="utf-8">
	<style>
		table {border-collapse:collapse; table-layout:fixed; width:880px;}
		table td {border:groove; 1px; Word-wrap:break-Word;}
	</style>
  </head>
  <body>	
	<table width='100%'>
		<tr>
			<td width='68%' bgcolor='#003366'></td>	
			<td width='8%' bgcolor='#003366'><div align='center'><input type='button' value='Imprimir' onClick='window.print()'/></div></td>
			<td width='9%' bgcolor='#003366'><div align='center'><input type=button onclick="window.location.href='../../sys/atendimento/consultar_atendimento_encerrada.php'" value='Consultar'></div></td>
			<td width='15%' bgcolor='#003366'><div align='center'><input type=button onclick="window.location.href='../../page/atendimento/formulario.php'" value='Abrir Atendimento'></div></td>
		</tr>
	</table>
	<CENTER><h1>Atendimentos Abertos</h1></CENTER>
	<BR>
	<TABLE>
		<TR VALIGN=top ALIGN=CENTER>
			<TD width="50px">
				<b>Nº</b>
			</TD>
			<TD width="230px">
				<b>Setor</b>
			</TD>
			<TD width="100px">
				<b>Data</b>
			</TD>
			<TD width="120px">
				<b>Equipamento</b>
			</TD>
			<TD>
				<b>Problema</b>
			</TD>
			<TD width="70px">
				<b>Ações</b>
			</TD>
		</TR>

<?php
//Verificando Sessão
session_start();
		
	if (!isset($_SESSION["newsession"]))
		header("Location: ../../page/login/expirou.html");

//instância
$db = new PDO("sqlite:../../banco/banco.db");

//visualiza
foreach ($db->query("SELECT atendimento.id, setor.setor, data_abertura, tipo, relatado FROM atendimento INNER JOIN setor ON setor.id = atendimento.setor WHERE situacao = 'Aberto'") as $row) {

echo "		<TD><CENTER>";
				print_r($row[0]);
echo "		</CENTER></TD>";
echo "		<TD>";
				print_r($row[1]);
echo "		</TD>";
echo "		<TD><CENTER>";
				print_r(date('d/m/Y',  strtotime($row[2])));
echo "		</CENTER></TD>";
echo "		<TD><CENTER>";
				print_r($row[3]);
echo "		</CENTER></TD>";
echo "		<TD><CENTER>";
				print_r($row[4]);
echo "		</CENTER></TD>";
echo "		<TD>";
echo "		<CENTER><a href='./consultar_atendimento_abrir.php?id=$row[0]'>Abrir</a></CENTER>";
echo "		</TD>";
echo "	</TR>";
}?>
	</TABLE>
  </body>
</html>
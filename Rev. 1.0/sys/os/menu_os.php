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
			<td width='74%' bgcolor='#003366'></td>	
			<td width='8%' bgcolor='#003366'><div align='center'><input type='button' value='Imprimir' onClick='window.print()'/></div></td>
			<td width='9%' bgcolor='#003366'><div align='center'><input type='button' onclick="window.location.href='../../sys/os/consultar_os_encerrada.php'" value='Consultar'></div></td>
			<td width='9%' bgcolor='#003366'><div align='center'><input type='button' onclick="window.location.href='../../page/os/formulario.php'" value='Abrir OS'></div></td>
		</tr>
	</table>
	
<center><h1>Ordem de Serviço Abertas</h1></center>
<BR>
<TABLE BORDER=1>
	<TR VALIGN=top ALIGN=CENTER>
		<TD width="50px">
			<b>OS</b>
		</TD>
		<TD width="230px">
			<b>Setor</b>
		</TD>
		<TD width="100px">
			<b>Entrada</b>
		</TD>
		<TD>
			<b>Identificação</b>
		</TD>
		<TD width="120px">
			<b>Equipamento</b>
		</TD>
		<TD>
			<b>Situação</b>
		</TD>
		<TD width="70px">
			<b>Ações</b>
		</TD>
	</TR>

<?php
//Verificar Sessão
	session_start();
		
	if (!isset($_SESSION["newsession"]))
		header("Location: ../../page/login/expirou.html");
	
//instância
$db = new PDO("sqlite:../../banco/banco.db");

foreach ($db->query("SELECT os.id, setor.setor, criado_em, patrimonio, equipamento, situacao FROM os INNER JOIN setor ON setor.id = os.setor WHERE fechado_em = ''") as $row) {

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
echo "		<TD><CENTER>";
				print_r($row[5]);
echo "		</CENTER></TD>";
echo "		<TD>";
echo "		<CENTER><a href='./consultar_os_abrir.php?id=$row[0]'> Abrir OS </a></CENTER>";
echo "		</TD>";
echo "	</TR>";
}?>
	</TABLE>
  </body>
</html>
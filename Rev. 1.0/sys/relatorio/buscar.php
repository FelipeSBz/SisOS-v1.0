<?php
//Verificar Sessão
	session_start();
		
	if (!isset($_SESSION["newsession"]))
		header("Location: ../../page/login/expirou.html");

//instância
$db = new PDO("sqlite:../../banco/banco.db");

$vpatrimonio = $_POST['patrimonio'];

//visualiza
echo "<h1>Ordem de Serviços Abertas do Equipamento: $vpatrimonio</h1>";
echo "<BR>";
echo "<TABLE BORDER=1 WIDTH=98% >";
echo "	<TR VALIGN=top ALIGN=CENTER Width=75%>";
echo "		<TD>";
echo "OS";
echo "		</TD>";
echo "		<TD>";
echo "Setor";
echo "		</TD>";
echo "		<TD>";
echo "Entrada";
echo "		</TD>";
echo "		<TD>";
echo "Equipamento";
echo "		</TD>";
echo "		<TD>";
echo "Ações";
echo "		</TD>";
echo "	</TR>";

foreach ($db->query("SELECT os.id, setor.setor, criado_em, equipamento, patrimonio FROM os INNER JOIN setor ON setor.id = os.setor WHERE patrimonio = '$vpatrimonio'") as $row) {

echo "		<TD>";
				print_r($row[0]);
echo "		</TD>";
echo "		<TD>";
				print_r($row[1]);
echo "		</TD>";
echo "		<TD>";
				print_r(date('d/m/Y',  strtotime($row[2])));
echo "		</TD>";
echo "		<TD>";
				print_r($row[3]);
echo "		</TD>";
echo "		<TD>";
echo "		<a href='./ver_os.php?id=$row[0]'> Abrir OS </a> ";
echo "		</TD>";
echo "	</TR>";

}
echo "</TABLE>";
echo "<br><input type='button' value='Voltar' onClick='history.go(-1)'>";
?>
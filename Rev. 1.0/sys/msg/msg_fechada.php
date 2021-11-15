<?php
//Verificar Sessão
	session_start();
		
	if (!isset($_SESSION["newsession"]))
		header("Location: ../../page/login/expirou.html");

	
//instância
$db = new PDO("sqlite:../../banco/chamadas.db");

//visualiza
echo "<h1>Mensagens Respondidas</h1>";
echo "<BR>";
echo "<TABLE BORDER=1 WIDTH=98% >";
echo "	<TR VALIGN=top ALIGN=CENTER Width=75%>";
echo "		<TD>";
echo "Data";
echo "		</TD>";
echo "		<TD>";
echo "Setor";
echo "		</TD>";
echo "		<TD>";
echo "Nome";
echo "		</TD>";
echo "		<TD>";
echo "Protocolo";
echo "		</TD>";
echo "		<TD>";
echo "Ações";
echo "		</TD>";
echo "	</TR>";

foreach ($db->query("SELECT data_envio, setor, nome, protocolo, resposta FROM msg WHERE resposta <> ''") as $row) {

echo "		<TD>";
				print_r(date('d/m/Y',  strtotime($row[0])));
echo "		</TD>";
echo "		<TD>";
				print_r($row[1]);
echo "		</TD>";
echo "		<TD>";
				print_r($row[2]);
echo "		</TD>";
echo "		<TD>";
				print_r($row[3]);
echo "		</TD>";
echo "		<TD>";
echo "		<a href='./ver_msg_resp.php?protocolo=$row[3]'> Abrir </a> ";
echo "		</TD>";
echo "	</TR>";

//echo "<br>";
}
echo "</TABLE>";
echo "<BR><input type='button' value='Voltar' onClick='history.go(-1)'>"; 
?>
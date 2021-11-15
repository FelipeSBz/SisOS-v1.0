<?php

//instância
$db = new PDO("sqlite:../../banco/chamadas.db");

$vprotocolo = $_POST['protocolo'];

//visualiza
echo "<h1>Busca de Protocolo</h1>";
echo "<BR>";
echo "<TABLE BORDER=1 WIDTH=98% >";
echo "	<TR VALIGN=top ALIGN=CENTER Width=75%>";
echo "		<TD>";
echo "Protocolo";
echo "		</TD>";
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
echo "Ações";
echo "		</TD>";
echo "	</TR>";


foreach ($db->query("SELECT id, protocolo, data_envio, setor, nome FROM msg WHERE protocolo = '$vprotocolo'") as $row) {

echo "	<TR ALIGN=CENTER>";
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
				print_r($row[4]);
echo "		</TD>";
echo "		<TD>";
echo "		<a href='./ver_msg.php?protocolo=$row[1]'> Ver Mensagem </a> ";
echo "		</TD>";
echo "	</TR>";

}
echo "</TABLE>";
echo "<br><input type='button' value='Voltar' onClick='history.go(-1)'>";
?>
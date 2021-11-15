<?php

//instância
$db = new PDO("sqlite:../../banco/chamadas.db");

$protocoloConsulta = $_GET['protocolo'];

//visualiza
foreach ($db->query("SELECT setor, nome, telefone, mensagem, protocolo, resposta FROM msg WHERE protocolo='$protocoloConsulta'") as $row) {
$setor = $row[0];
$nome = $row[1];
$telefone = $row[2];
$mensagem = $row[3];
$protocolo = $row[4];
$resposta = $row[5];


echo "<!DOCTYPE html>";
echo "<html lang='pt-br'>";
echo "  <head>";
echo "    <title>Mensagens</title>";
echo "    <meta charset='utf-8'>";
echo "  </head>";
echo "  <body>";
echo "    <h1>Mensagem - $protocolo</h1>";
echo "	<form method='POST' action=''>";
echo "		<p>Setor: </p> <input type='text' size='42' name='setor' maxlength='42' value='$setor' disabled=''>";
echo "		<p>Nome: </p> <input type='text' size='42' name='nome' maxlength='42' value='$nome' disabled=''>";
echo "		<p>Ramal: </p> <input type='text' size='20' name='telefone' maxlength='12' value='$telefone'disabled=''>";
echo "		<p>Mensagem Recebida: </p><textarea name='mensagem' rows='6' cols='59' disabled=''>$mensagem</textarea>";
echo "		<p>Resposta da Mensagem: </p><textarea name='resposta' rows='6' cols='59' disabled=''>$resposta</textarea>";
}
?>
		<BR><input type='button' value='Voltar' onClick='history.go(-1)'>
	</form>
  </body>
</html>
<?php
//Verificar Sessão
	session_start();
		
	if (!isset($_SESSION["newsession"]))
		header("Location: ../../page/login/expirou.html");

$vresposta = $_POST['resposta'];
$vdata = date("j/n/Y");

$vprotocolo = $_GET['protocolo'];

//instância
$db = new PDO("sqlite:../../banco/chamadas.db");

//insere os dados
$sqlI = "UPDATE msg SET resposta='$vresposta', data_resposta='$vdata' WHERE protocolo='$vprotocolo'";

$stmt = $db->exec($sqlI);

echo "<h1>Mensagem Respondida!</h1> <br><br><A HREF='../../page/msg/msg.html'><B> >>> Clique aqui para Voltar <<<</B></A>";

?>
<?php
//Verificar Sessão
session_start();
		
if (!isset($_SESSION["newsession"]))
	header("Location: ../../page/login/expirou.html");

//Carregar variaveis
$vrealizado = $_POST['realizado'];
$vsituacao = $_POST['situacao'];

$idConsulta = $_GET['id'];

//instância
$db = new PDO("sqlite:../../banco/banco.db");

//insere os dados
$sqlI = "UPDATE atendimento SET realizado='$vrealizado', situacao='$vsituacao' WHERE id='$idConsulta'";

$stmt = $db->exec($sqlI);

echo "<h1>Atualizado com sucesso!</h1> <br><br><A HREF='./menu_atendimento.php'><B> >>> Clique aqui para Voltar <<<</B></A>";

?>

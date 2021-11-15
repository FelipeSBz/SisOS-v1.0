<?php

session_start();

if (!isset($_SESSION["newsession"]))
		header("Location: ../../page/login/expirou.html");

$login = $_SESSION["newsession"];
$senha = MD5($_POST['senha']);

$db = new PDO("sqlite:../../banco/banco.db");

$sqlI = "UPDATE usuarios SET senha = '$senha' WHERE login = '$login'";
$stmt = $db->exec($sqlI);

echo "Senha atualizada com sucesso!";

?>
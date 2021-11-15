<?php

session_start();
if (!isset($_SESSION["newsession"]))
		header("Location: ../../page/login/expirou.html");
	
$login = $_POST['login'];
$senha = MD5($_POST['senha']);

$db = new PDO("sqlite:../../banco/banco.db");

$sqlI = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
$stmt = $db->exec($sqlI);

echo "Usuário cadastrado com sucesso!";

?>
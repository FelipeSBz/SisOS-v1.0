<?php

session_start();
	if (isset($_SESSION["newsession"])){
		$NLogin = strtoupper($_SESSION["newsession"]);
	}else
		header("Location: ../../page/login/expirou.html");	
		
$vsetor = $_POST['setor'];
$vnome = $_POST['nome'];
$vtelefone = $_POST['telefone'];
$vequipamento = $_POST['equipamento'];
$vtecnico = $NLogin;
$vrelatado = $_POST['relatado'];
$vrealizado = $_POST['realizado'];
$vsituacao = $_POST['situacao'];
$vcriado_em = date('Y-m-d');

//instância
$db = new PDO("sqlite:../../banco/banco.db");

//insere os dados
$sqlI = "INSERT INTO atendimento (setor, nome, telefone, tipo, tecnico, relatado, realizado, situacao, data_abertura) 
		VALUES ('$vsetor', '$vnome', '$vtelefone', '$vequipamento', '$vtecnico', '$vrelatado', '$vrealizado', '$vsituacao', '$vcriado_em')";
$stmt = $db->exec($sqlI);

echo "<CENTER><h1>Cadastro Realizado com Sucesso!</h1></CENTER>";
echo "<BR><CENTER><a href='./menu_atendimento.php'>(... VOLTAR ...)</a></CENTER>";

?>
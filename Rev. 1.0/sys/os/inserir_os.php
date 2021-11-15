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
$vpatrimonio = $_POST['patrimonio'];
$vrelatado = $_POST['relatado'];
$vtecnico = $NLogin;
$vconstatado = $_POST['constatado']; 
$vrealizado = $_POST['realizado'];
$vsituacao = $_POST['situacao'];
$vcriado_em = date('Y-m-d');
if ($vsituacao == "Encerrado")
	$vfechado_em = date('Y-m-d');
else
	$vfechado_em = "";

//instância
$db = new PDO("sqlite:../../banco/banco.db");

//insere os dados
$sqlI = "INSERT INTO os (setor, nome, telefone, equipamento, patrimonio, relatado, tecnico, constatado, realizado, situacao, criado_em, fechado_em, cancelado) 
		VALUES ('$vsetor', '$vnome', '$vtelefone', '$vequipamento', '$vpatrimonio', '$vrelatado', '$vtecnico', '$vconstatado', '$vrealizado', '$vsituacao', '$vcriado_em', '$vfechado_em', 0 )";
$stmt = $db->exec($sqlI);

echo "<CENTER><h1>Cadastro Realizado com Sucesso!</h1></CENTER>";
echo "<BR><CENTER><a href='./menu_os.php'>(... VOLTAR ...)</a></CENTER>";

?>
<?php
//Verificar Sessão
	session_start();
		
	if (!isset($_SESSION["newsession"]))
		header("Location: ../../page/login/expirou.html");

$vconstatado = $_POST['constatado']; 
$vrealizado = $_POST['realizado'];
$vsituacao = $_POST['situacao'];

$idConsulta = $_GET['id'];
$idUsuario = $_SESSION["idSisOS"];
$vtecnico = ucfirst($_SESSION["newsession"]);


//instância
$db = new PDO("sqlite:../../banco/banco.db");


if ($vsituacao == "Encerrado"){
	
	//Configurar Time Zone
	date_default_timezone_set('America/Sao_Paulo');
	
	$vfechado_em = date("Y-n-j");
		
	//Insere dados da OS
	$sqlI = "UPDATE os SET constatado='$vconstatado', realizado='$vrealizado', situacao='$vsituacao', fechado_em='$vfechado_em' WHERE id='$idConsulta'";
	$stmt = $db->exec($sqlI);
	
	//Insere dados do histórico da OS
	$sqlI = "INSERT INTO historico_os (id_os, id_usuario, data_hora, descricao) VALUES('$idConsulta','$idUsuario','$vfechado_em','Ordem de Serviço encerrada por $vtecnico')";
	$stmt = $db->exec($sqlI);
}else{
	$vfechado_em = "";
	
	//insere os dados
	$sqlI = "UPDATE os SET constatado='$vconstatado', realizado='$vrealizado', situacao='$vsituacao', fechado_em='$vfechado_em' WHERE id='$idConsulta'";
	$stmt = $db->exec($sqlI);
}

echo "<h1>Atualizado com sucesso!</h1> <br><br><A HREF='./menu_os.php'><B> >>> Clique aqui para Voltar <<<</B></A>";

?>

<?php

$vsetor = $_POST['setor'];
$vnome = $_POST['nome'];
$vtelefone = $_POST['telefone'];
$vmensagem = $_POST['mensagem'];
$vdata = date("Y-n-j"); 
$vprotocolo = date("YnjHis") . "-" . rand(0,9);

//instância
$db = new PDO("sqlite:../../banco/chamadas.db");

//insere os dados
$sqlI = "INSERT INTO msg (setor, nome, telefone, data_envio, mensagem, resposta, protocolo) 
		VALUES ('$vsetor', '$vnome', '$vtelefone', '$vdata', '$vmensagem', '', '$vprotocolo')";
$stmt = $db->exec($sqlI);

echo "Mensagem enviada com sucesso! Seu protocolo é: $vprotocolo";
?>
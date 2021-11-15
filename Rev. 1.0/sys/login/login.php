<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Login SisOS</title>
    <meta charset="utf-8">
  </head>
  <body>
  <?php
	$vnome = $_POST['nome'];
	$vsenha = MD5($_POST['senha']);
	$localizar = 0;
	$db = new PDO("sqlite:../../banco/banco.db");
	
	foreach ($db->query("SELECT id, senha FROM usuarios WHERE login = '$vnome'") as $row) {
		if ($vsenha == $row[1]){
			$localizar = 1;
			
			session_start();
			$_SESSION["newsession"]= $vnome;
			$_SESSION["idSisOS"]= $row[0];
	
			header("Location: ../../page/principal");
		}
	}
	//Caso não encontrar, voltar para a tela de login
	if($localizar == "0"){		
		header("Location: ../../page/login/login.php?id=1");
	}

  ?>
  </body>
</html>



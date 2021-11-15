<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Login SisOS</title>
</head>
<body>
<TABLE BORDER=0 height=100% WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TD VALIGN=top width=80%>

		<CENTER><IMG SRC='../img/logo.jpg' border=0><BR></CENTER>

		<BR>
		<CENTER><h1>Login do SisOS v1.0</h1></CENTER>
		<CENTER><div>
			<form method="POST" action="../../sys/login/login.php">
				<label>Login: </label><input type="text" name="nome">
				<BR><BR>
				<label>Senha: </label><input type="password" name="senha">
				<BR><BR>
				<input type="reset" value="Limpar">
				<input type="submit" value="Logar">
			</form>
		</div></CENTER>
		<BR>
		<CENTER><a href="../msg/formulario_msg.html">Fale com o CPD</a></CENTER>
		
		<?php
			if(isset($_GET['id'])) {
				$id = $_GET['id'];
				if ($id == '1')
					echo "<CENTER><p>Erro na senha ou usuário!</p></CENTER>";
			}
		?>
		
	</TD>
</TABLE>
</body>
</html>

<HTML lang="pt-br">
<HEAD>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Sistema de Ordem de Serviço</title>
	<META name="description" content="Sistema de Ordem de Serviço">
	<META name="keywords" content="Sistema de Ordem de Serviço">
	<META name="revisit-after" content="7days">
	<META name="robots" content="index, follow">
	<link href="../css/button.css" rel="stylesheet">
 
<style type="text/css">
	body,td			{ font-family: arial, helvetica; color: #434343; font-size: 12px; }
	

	A:link			{ text-decoration: none; color: #2244ee; }
	A:visited		{ text-decoration: none; color: #2244ee; }
	A:hover			{ text-decoration: underline; }

	.hidden			{ font-size: 8px; font-weight: bold; color: #ffffff; }
	A:link.hidden		{ text-decoration: none; color: #ffffff; }
	A:visited.hidden	{ text-decoration: none; color: #ffffff; }
	A:hover.hidden		{ text-decoration: none; color: #ffffff; }

	.small			{ font-size: 10px; }

	.emph			{ font-weight: bold; }
</style>


</HEAD>

<BODY BGCOLOR="FFFFFF" TEXT="000000" LINK="0000FF" VLINK="0000FF" Marginwidth=0 marginheight=0 leftmargin=0 topmargin=0>


<TABLE BORDER=0 height=100% WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0>
<TR>

<TD VALIGN=top BGCOLOR=1919e6 width=20%>

<!--    ---------------- LEFT SECTION ---------------    -->
<FONT SIZE=6 COLOR=WHITE><B>
	<CENTER><BR>SisOS<BR>Versão 1.0<BR></CENTER>
</B></FONT>

<BR><BR><BR><BR>

 <a href="index.php?id=0" class="shiny-button"><strong>Atendimentos Realizados</strong></a>
 <BR><BR>
 <a href="index.php?id=1" class="shiny-button"><strong>Ordem de Serviço</strong></a>
 <BR><BR>
 <a href="index.php?id=2" class="shiny-button"><strong>Central de Mensagens</strong></a>
 <BR><BR>
 <a href="index.php?id=3" class="shiny-button"><strong>Relatórios do Sistema</strong></a>
<BR><BR>
 <a href="index.php?id=4" class="shiny-button"><strong>Administração do Sistema</strong></a>
 <BR><BR>
 <a href="index.php?id=5" class="shiny-button"><strong>Sair do Sistema </strong></a>

<!--    ---------------- END LEFT SECTION ---------------    -->

</TD>


<TD VALIGN=top width=80%>

<!--    ---------------- CENTER SECTION ---------------    -->

<CENTER><BR><BR><IMG SRC='../img/logo.jpg' border=0><BR><BR></cENTER>

<!--    ---------------- TOP LINKS SECTION ---------------    -->

<TABLE BORDER=0 WIDTH=75% ALIGN=CENTER BGCOLOR=1919e6>
<TR><TD><CENTER><FONT COLOR=WHITE size=2>
	<?php
	session_start();
		
	if (isset($_SESSION["newsession"])){
		$NLogin = strtoupper($_SESSION["newsession"]);
		echo "Bem Vindo $NLogin!";
	}else
		header("Location: ../../page/login/login.php");	
	?>
</FONT></CENTER></TD></TR>
</TABLE>

<BR>

<TABLE BORDER=0 WIDTH=98% ALIGN=CENTER>
	<TR>
		<TD VALIGN=top ALIGN=CENTER Width=75%>
			<?php
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
					if ($id == '0')
						echo "<iframe width='920px' height='510px' src='../../sys/atendimento/menu_atendimento.php'></iframe>";
					if ($id == '1')
						echo "<iframe width='920px' height='510px' src='../../sys/os/menu_os.php'></iframe>";
					if ($id == '2')
						echo "<iframe width='920px' height='510px' src='../msg/msg.html'></iframe>";
					if ($id == '3')
						echo "<iframe width='920px' height='510px' src='../relatorio/buscar.html'></iframe>";
					if ($id == '4')
						echo "<iframe width='920px' height='510px' src='../login/atualizar.html'></iframe>";
					if ($id == '5'){
						unset($_SESSION["newsession"]);
						header("Location: ../../page/login/login.php");
					}
				} else{
					echo "<iframe width='900px' height='490px' src='sobre.html'></iframe>";
				}
			?>
		</TD>
	</TR>
</TABLE>

<BR>

<!--    ---------------- BOTTOM LINKS SECTION ---------------    -->

<TABLE BORDER=0 WIDTH=75% ALIGN=CENTER BGCOLOR=1919e6>
	<TR>
	<TD><CENTER><FONT COLOR=WHITE size=2>
		<p>Centro de Processamento de Dados</P> 
	</FONT></CENTER></TD></TR>
</TABLE>
<BR>
</TD>
</TR>
</TABLE>

</BODY>
</HTML> 


<!DOCTYPE html> 
<html lang="pt-br">
<head>
	<meta charset="utf-8">

	<style type="text/css"> 	
	.style1 {																																																																																													
		text-align: left;
	}
	</style>
</head>
<body>
	<?php
	session_start();
		
	if (isset($_SESSION["newsession"])){
		$NLogin = strtoupper($_SESSION["newsession"]);
	}else
		header("Location: ../../page/login/expirou.html");	
	?>
	
	<form method="POST" action="../../sys/atendimento/inserir_atendimento.php">
		<div align="center">
			<table width="100%">
				<tr>
					<td width="10%" bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Secretaria:</font></div></td>
					<td width="40%" bgcolor="#CCCCCC">
						<select id="combo1" name="secretaria" required><option></option></select></td>
										
					<td width="10%" bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Setor</font></div></td>
					<td width="40%" bgcolor="#CCCCCC">
						<select id="combo2" name="setor" required><option></option></select></td>
											
						<script language="javascript" type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
						<script type="text/javascript">
							//Array de Categoria em JSON puro
							var categorias = [
								<?php
									$db = new PDO("sqlite:../../banco/banco.db");
									foreach ($db->query("SELECT * FROM secretaria") as $row) {
										echo "{ 'Id': '$row[0]', 'Categoria': '$row[1]' },";
									}
								?>
								]
							//Array de Subcategoria em JSON puro
							var subCategorias = [
								<?php
									foreach ($db->query("SELECT * FROM setor ORDER BY setor") as $row) {
										echo "{ Id: $row[0], IdCategoria: $row[1], Nome: '$row[2]' },";
									}
									
								?>
								]

							$(document).ready(function () {
							//Percorre o array de categorias para popular o combo de categorias
							$.each(categorias, function (i, categoria) {
								//Faz o append (adiciona) cada um dos itens do array como options do select de id combo1
								$("#combo1").append($('<option>', {
								//neste caso o value do option vai ser a pripriedade Id (é case sensitive, então cuide da nomenclatura)
								value: categoria.Id,
								//no text estou usando a propriedade Categoria dos objetos dentro do array categoria (case sensitive também)
								text: categoria.Categoria
							}))
							})
							//Vai ser acionado cada vez que o combo1 tracar de item selecionado
							$("#combo1").change(function () {
							//Pegando o novo valor selecionado no combo
							var categoria = $(this).val()
							carregaCombo2(categoria);
							})

							//Definir o item selecionado no carregamento da página
							$("#combo1").val(0)
							//carregar o combo2 baseado na categoria selecionada
							carregaCombo2(0)
							//Selecionar a subcategoria passando o id dela
							$("#combo2").val(3)
							})
		
							function carregaCombo2(categoria) {
							//Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no combo1
							var subCategoriasFiltradas = $.grep(subCategorias, function (e) { return e.IdCategoria == categoria; });
							//Faz o append (adiciona) cada um dos itens do array filtrado no combo2
							$("#combo2").html('<option></option>');
							$.each(subCategoriasFiltradas, function (i, subcategoria) {
							$("#combo2").append($('<option>', {
							value: subcategoria.Id, //Id do objeto subcategoria
							text: subcategoria.Nome //Nome da Subcategoria
							}))
							})
							}
						</script>
				</tr>

				<tr>
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Funcionário:</font></div></td>
					<td bgcolor="#CCCCCC">
						<input type="text" size="42" name="nome" maxlength="60" value="" required></td>
						
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Contato:</font></div></td>
					<td bgcolor="#CCCCCC">
						<input type="text" size="20" name="telefone" maxlength="15" value="" required><input type=button onClick="parent.open('../../sys/ramal/lista.php')" 
value='Lista de Ramais'></td>						
				</tr>

				<tr>				
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Equipamento:</font></div></td>
					<td bgcolor="#CCCCCC">
						<select name="equipamento" required>
							<option value="Computador" selected>Computador</option>
							<option value="Impressora">Impressora</option>							
							<option value="Rede">Rede</option>							
							<option value="Telefone">Telefone</option>
							<option value="Outros">Outros</option>								
						</select>
						
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Técnico:</font></div></td>
					<td bgcolor="#CCCCCC">
						<?php
							echo "<input type='text' size='42' name='tecnico' maxlength='60' value='$NLogin' disabled=''></td>";
						?>
				</tr>
				
				<tr>						
					<td bgcolor="#02679C"><div align="center">
						<font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">Situação:</font></div></td>
					<td bgcolor="#CCCCCC">
						<select name="situacao" required>
							<option value="Aberto"  selected>Aberto</option>
							<option value="Fechado">Fechado</option>							
						</select></td>

					<td bgcolor="#CCCCCC"></td>						
					<td bgcolor="#CCCCCC"></td>
				</tr>
			</table>
			
			<table width="100%">
				<tr>
					<td width="10%" bgcolor="#02679C"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Problema Informado(s):</font></div></td>
					<td width="90%" bgcolor="#CCCCCC"><textarea name="relatado" rows="5" cols="59" required></textarea></td>
				</tr>
				
				<tr>
					<td width="10%" bgcolor="#02679C"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">
						Serviço executado(s):</font></div></td>
					<td width="90%" bgcolor="#CCCCCC"><textarea name="realizado" rows="5" cols="59"></textarea></td>
				</tr>
			</table>

			<table width="100%">
				<tr>
					<td width="10%" bgcolor="#003366"><div align="center"><input type='button' value='Voltar' onClick='history.go(-1)'></div></td>
					<td width="40%" bgcolor="#003366"></td>
					<td width="10%" bgcolor="#003366"><div align="center"><input type="submit" name="cadastrar" value="Cadastrar"></div></td>
					<td width="40%" bgcolor="#003366"></td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
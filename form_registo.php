<?php 
	include("includes/body.php");
	top();
  
      logged();

  


if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "admin")
	{
		c_compras();
}
elseif($_SESSION['user_id'] == "admin")
	menu_admin();
	else
	login();
 
				 
   		menu();
		
		
	pesquisa();
	?>
	
	
	<div  style="position:absolute; left: 468px; top: 357px; width: 358px; height: 228px;">
<form id="reg_user_form" method="post" action="exe_registo.php" enctype="multipart/form-data" >
<table cellpadding="3" border="1" style="border-collapse:collapse; border-color:#333;" align="center">

<tr><td>&nbsp;</td></tr>
<tr>
<td class="registo">Nome Completo:*</td><td><input type="text" name="nome" id="nome" /></td>
</tr>
<tr>
<td class="registo">Morada:*</td><td><input type="text" name="morada" id="morada" /></td>
</tr>
<tr>
<td class="registo">Localidade:</td><td><input type="text" name="localidade" id="localidade" /></td>
</tr>
<tr>
<td class="registo">Código postal:*</td><td><input id="cp" maxlength="8" type="text" name="cp" /></td>
</tr>
<tr>
<td class="registo">Número de telefone:</td><td><input id="tel" maxlength="9" type="text" name="tel"/></td>
</tr>
<tr>
<td class="registo">E-mail:*</td><td><input type="text" name="mail" id="mail" /></td>
</tr>
<tr>
<td class="registo">NIF:</td><td><input id="nif" maxlength="9" type="text" name="nif"/></td>
</tr>
<tr>
<td class="registo">Palavra-passe:* </td><td><input id="pass" type="password" name="pass" /></td>
</tr>
<tr>
<td class="registo">Confirme a palavra-passe:*</td><td><input type="password" id="conf_password" name="conf_password" /></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Registar" name="registo" /><input type="reset" value="Limpar" /></td>
</tr>
<tr><td style="font-size:11px" colspan="2" class="registo">* - Campos de preenchimento obrigatório</td></tr>
</table></font>
</form>
</div>
     

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>



<?php if(!isset($_SESSION['user_id']))
			session_start();


include("includes/body.php"); 
		top();
    
  if (!isset($_SESSION['user_id']))
		{header("location:index.php?erro=6");
										exit();}
					    logged();

  
					if((isset($_GET['erro'])) && ($_GET['erro'] == "mail"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#CC0000'>O E-mail que introduziu não é válido ou já está a ser utilizado.</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == "address"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#CC0000'>A morada que introduziu não é válida.</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == "nome"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#CC0000'>O nome que introduziu não é válido.</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == "cp"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#CC0000'>O código postal que introduziu não é válido.</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == "passmatch"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#CC0000'>As novas palavras-passe que introduziu não coicidem ou são pequenas demais.</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == "passold"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#CC0000'>A antiga palavra-passe que introduziu está incorrecta.</font></span>";
					elseif((isset($_GET['form_sub'])) && ($_GET['form_sub'] == "not"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar esta operação. Por favor, tente novamente.</font></span>";
					elseif((isset($_GET['alt'])) && ($_GET['alt'] == "done"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#000060'>Dados alterados com sucesso!</font></span>";
					elseif((isset($_GET['alt_pass'])) && ($_GET['alt_pass'] == "done"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#000060'>Dados e palavra-passe alterados com sucesso!</font></span>";
					elseif((isset($_GET['alt_pass'])) && ($_GET['alt_pass'] == "not"))
					echo "<span style='left:400px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Para alterar a palavra-passe terá de preencher os 3 respectivos campos.</font></span>";
					



		c_compras();


  
   		menu();
	pesquisa();
	
	if($_GET['id'] == $_SESSION['user_id'])
	 {
	
	if(isset($_SESSION['user_id']) && isset($_GET['id']) && $_GET['id'] != "")
	{
	$res=mysql_query("select * from clientes where cliente_id=".$_GET['id']);
	$num=mysql_affected_rows();
	if($num > 0)
	{
	?>
  <div style="left:450px; top:380px; position:absolute;">
   <table cellpadding="3" align="left" border="1" style="border-collapse:collapse; border-color:#333;"><form method="post" action="exe_alterar_utilizador.php">
     <tr>
     	<td class="tableheaders" colspan="2">Os meus dados</td></tr>
        <tr>
        <td >Nome:* </td>
        <td><input type="hidden" name="id" value="<?php echo mysql_result($res,0,"cliente_id");?>" /><input type="text" name="nome" value="<?php echo mysql_result($res,0,"cliente_nome");?>" /></td>
     </tr>
     <tr>
     	<td>Morada:*</td>
        <td><input type="text" name="morada" value="<?php echo mysql_result($res,0,"cliente_morada");?>"  /></td>
     </tr>
     <tr>
     	<td>Código Postal:*</td>
        <td><input type="text" name="cp" maxlength="8" value="<?php echo mysql_result($res,0,"cliente_cp");?>" /></td>
        </tr>
        <tr><td>Localidade:</td><td><input type="text" name="localidade" value="<?php echo mysql_result($res,0,"cliente_localidade");?>" /></td>
     </tr>
     <tr>
     	<td>Telefone:</td>
        <td><input type="text" maxlength="9" name="tel" value="<?php echo mysql_result($res,0,"cliente_telefone");?>" ></td>
     </tr>
      <tr>
     	<td>E-mail:*</td>
        <td><input type="text" name="mail" value="<?php echo mysql_result($res,0,"cliente_email");?>" /></td>
     </tr>
     <tr>
     	<td>NIF: </td>
        <td><input type="text" name="nif" maxlength="9" value="<?php echo mysql_result($res,0,"cliente_nif");?>" /></td>
     </tr>
      <tr>
     	<td class="tableheaders" colspan="2">Alterar palavra-passe</td></tr>
     <tr>
     	<td>Antiga palavra-passe: </td><td><input type="password" name="old_pass"  />
      <tr>
     	<td>Nova palavra-passe: </td>
        <td><input type="password" name="nova_pw"  /></td>
     </tr>
      <tr>
     	<td>Confirme nova palavra-passe: </td>
        <td><input type="password" name="nova_pw_conf"  /></td>
     </tr>
      <tr>
     	<td></td>
        <td><input type="submit" name="go_change" value="Alterar" /><input type="reset" value="Limpar" /></td>
     </tr></form>
     <tr><td style="font-size:11px" colspan="2">* - Campos de preenchimento obrigatório</td></tr>
    </table>
  
  </div>
<?php }
	}
		else 
		 {
			 header("location:index.php?erro=9");
			 exit();
		 }
	 }else
	 	{header("location:index.php?erro=10");}
		 ?>

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>


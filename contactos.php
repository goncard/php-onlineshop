
<?php include("includes/body.php"); 

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


	
	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
					menu_admin();





 if((isset($_GET['erro'])) && ($_GET['erro'] == "nome"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Por favor, introduza o seu nome no respectivo campo.</font></span>";				
		elseif((isset($_GET['erro'])) && ($_GET['erro'] == "mail"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>O e-mail que introduziu não é válido.</font></span>";	
if((isset($_GET['erro'])) && ($_GET['erro'] == "msg"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Por favor, digite a mensagem no respectivo campo.</font></span>";	
if((isset($_GET['form'])) && ($_GET['form'] == "not"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar esta operação. Por favor, tente novamente.</font></span>";	
	
	?>

  <div style="position:absolute; left: 468px; top: 357px; width: 358px; height: 228px;">
  <div> <img src="imagens/contactos.jpg" /></div
  <div>&nbsp;</div>
     <table border="1" style="border-collapse:collapse; border-color:#333;"  cellpadding="3" align="left">
    
     <tr>
     	<td>Morada: </td><td width="70">Rua .... Nº 0000  0000-000 Localidade</td>
     </tr>
     <tr>
     	<td width="40">Telefone: </td><td>000000000</td>
     </tr>
     <tr>
     	<td width="40">E-mail: </td><td>apocalyptic.online@gmail.com</td>
     </tr>
     </table>
     </div>
     <div style="position:absolute; left: 469px; top: 595px;">
     <table border="1" style="border-collapse:collapse; border-color:#333;" class="tableheaders"  cellpadding="3" ><tr><td colspan="2">
     Envie uma mensagem para nós com sugestões ou dúvidas.</td></tr>
     <tr>
     	<td width="40">Assunto: </td>
        <td><form method="post" action="exe_mail.php" ><input type="text" name="assunto" /></td>
     </tr>
     <tr>
      	<td width="40">Nome:* </td>
        <td><input type="text" name="nome" /></td>
     </tr>
     <tr>
      	<td width="40">E-mail:* </td>
        <td><input type="text" name="mail" /></td>
     </tr>
     <tr>
      	<td width="40">Mensagem:* </td>
        <td><textarea style="width:250px; height:100px">Digite aqui a sua mensagem!</textarea></td>
     </tr>
     <tr>
     	<td width="40">&nbsp;</td>
        <td><input type="submit" value="Enviar" /></form></td>
     </tr>
     <tr><td align="center" style="font-size:11px;">* - campos de preenchimento obrigatório</td></tr>
     </table>

</div>
     

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>
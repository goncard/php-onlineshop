
<?php 
	include("includes/body.php");
	top();
  
      logged();


 if((isset($_GET['form'])) && ($_GET['form'] == "not"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Todos os campos são de preenchimento obrigatório.</font></span>";				
		 elseif((isset($_GET['pass'])) && ($_GET['pass'] == "not"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>E-mail e/ou palavra-passe incorrecta.</font></span>";				
		

  

if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "admin")
		c_compras();

elseif(isset($_SESSION['user_id']) && $_SESSION['user_id'] == "admin"){
	menu_admin();}
	
	else{
		login();}
			
  
   		menu();
		
		
	pesquisa();
	
	

	
		if(!isset($_SESSION['user_id']))
		{ 
 
?> 
<div style="position:absolute; left: 350px; top: 365px; width: 502px; height: 228px;">
<table border="1" style="border-collapse:collapse; border-color:#333;"  cellpadding="3" align="center"><form method="post" action="exe_password_rec.php">
<tr>
	<td height="40">E-mail:*</td><td><input type="text" name="mail" /></td>
</tr>
<tr>
	<td height="40">Palavra-passe:*</td><td><input type="password" name="pass" /></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="Recuperar palavra-passe" /></td>
</tr>
<tr><td colspan="2" style="font-size:11px;">* - campos de preenchimento obrigatório</td></tr>
</form>
</table>
</div>
<?php 

} else
	{header("location:index.php?pr=user");
	exit();
	}

	
	?>


<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>
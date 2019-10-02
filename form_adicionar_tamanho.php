

<?php 


include("includes/body.php"); 
		top();
  

   		menu();
	pesquisa();
	    logged();

	
	
	
					
	
	
    if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] =='admin'))
	{   menu_admin(); ?>
  <div style="left:500px; top:350px; position:absolute;"><form method="post" action="exe_adicionar_tamanho.php">
    <table cellpadding="3" align="center" border="1" style="border-collapse:collapse; border-color:#333;">
     <tr>
     <td colspan="2" align="center"><font style="font-size:14px;"><b>Novo tamanho</b></font></td>
     </tr>
     <tr>
        <td>Nome: </td>
        <td><input type="text" name="nome" /></td>
     </tr>
      <tr>
     	<td></td>
        <td><input type="submit" name="adiciona_t" value="Adicionar" /><input type="reset" value="Limpar" /></td>
     </tr>
    </table>
  </form>
  </div>
<?php }
			else header("location:index.php?erro=5");
				exit();
				?>

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>

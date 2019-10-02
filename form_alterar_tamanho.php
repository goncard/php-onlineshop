<?php
include("includes/body.php"); 
	
  		top();
  
 
   		menu();
	pesquisa();
	    logged();


					
	
	
	
	if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] == 'admin'))
	{menu_admin();
		if(isset($_GET['id']) && $_GET['id'] != "")
		{
	$res=mysql_query("select * from tamanhos where tamanho_id=".$_GET['id']);
	$num=mysql_affected_rows();
	if($num>0)
	{
	
	?>
  <div style="left:442px; top:334px; position:absolute;">
    <form method="post" action="exe_alterar_tamanho.php" ><table border="1" cellpadding="3" style="border-collapse:collapse; border-color:#333;">
   
     <tr>
     	
        <td width="146">Nome: </td>
        <td width="62"><input type="text" name="nome" value="<?php echo mysql_result($res,0,"tamanho_nome");?>"/><input type="hidden" name="id" value="<?php echo mysql_result($res,0,"tamanho_id");?>" /></td>
     </tr>
      <tr>
     	<td></td>
        <td><input type="submit" name="altera_t" value="Alterar" /><input type="reset" value="Limpar" /></td>
     </tr>
    </table>
  </form>
  </div>

<?php }
else{
	header("location:gerir_tamanhos.php?tamanho=not");
	exit();}
		}
		else{
			header("location:gerir_tamanhos.php?erro=tid");
			exit();}
	
	}else
		header("location:index.php?erro=5");
			
		?>
<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>



<?php include("includes/body.php"); 
  
  
  	top();
	
    logged();



if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "admin")
			c_compras();
else{
	login();}
 
				 
   		menu();
		
		
	pesquisa();
	
	
	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
					menu_admin();
	
		
		
	if(isset($_GET['id']) && $_GET['id'] != "")
	{	
	$sql=mysql_query("select * from produtos where produto_id=".$_GET['id']) or die (mysql_error());
	$num=mysql_affected_rows();
	if ($num > 0)
	{
	?>

  <div style="position:absolute; left: 434px; top: 342px; width: 502px; height: 228px;">
  
  <table border="1" cellpadding="3" style="border-collapse:collapse; border-color:#333;"> 
  
    
     <tr>
     	<td align="center" colspan="3" class="tableheaders"><b><?php echo mysql_result($sql,0,"produto_nome");?></b></td></tr>
        <tr><td rowspan="3"><img src="imagens/produtos/n_<?php echo mysql_result($sql,0,"produto_foto");?>" /></td></tr>
                <form action="adiciona_carrinho.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo mysql_result($sql,0,"produto_id");?>" name="id" /></td>
     </tr>
     <tr>
     	<td height="93" colspan="3"><?php echo mysql_result($sql,0,"produto_descricao");?></td>
     </tr>
     <tr><td align="center"><b><?php echo mysql_result($sql,0,"produto_preco");?> €</b></td></tr>
     
     
	    <td width="215" align="center"><select name="tamanho" style="font-family:Calibri; width:80px; ">
        <option value="none">Tamanho</option>
        <?php 
        $sql1=mysql_query("select * from tamanhos");
		$num=mysql_affected_rows();
		for ($conta=0;$conta<$num;$conta++)
		{
		?><option value="<?php echo mysql_result($sql1,$conta,"tamanho_id");?>"><?php echo mysql_result($sql1,$conta,"tamanho_nome");?></option>
  <?php } ?>
        </select>
        <select name="qtd" style="width:100px; font-family:Calibri;">
        <option value="none">Quantidade</option>
        <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option>

		</select>

        <input type="submit" class="botaotbl" value="Comprar" name="carrinho_go" /></form></td><td align="center"><b><?php if(mysql_result($sql,0,"produto_novidade") == "sim" && mysql_result($sql,0,"produto_promo") == "nao") echo "Novidade!"; elseif(mysql_result($sql,0,"produto_novidade") == "nao" && mysql_result($sql,0,"produto_promo") == "sim") echo "Promoção!"; elseif(mysql_result($sql,0,"produto_novidade") == "sim" && mysql_result($sql,0,"produto_promo") == "sim") echo "Novidade e em promoção!";?></b></td>
 
        
     </tr>
   
   <?php 
  }
  else
		{
			header("location:index.php?f_prod=not");
			exit();
		}
		?>
		</tr></table>
						
	
  </div>
     
     <?php }
	 else
	 {
		 header("location:index.php?erro=9");
	 }?>

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>
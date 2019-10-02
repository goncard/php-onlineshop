
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
	$res=mysql_query("select * from produtos where produto_id=".$_GET['id']);
	$num=mysql_affected_rows();
	if($num>0)
	{
	?>
  <div style="left:442px; top:334px; position:absolute;"><form method="post" action="exe_alterar_produto.php" enctype="multipart/form-data">
    <table width="260" height="190" align="left" border="1" style="border-collapse:collapse; border-color:#333;" cellpadding="3">
     <tr>
     <td colspan="2" align="center" style="font-size:14px; font: bold;">Alterar produto</td>
     </tr>
     <tr>
     	
        <td width="146">Nome: </td>
        <td width="62"><input type="text" name="nome" value="<?php echo mysql_result($res,0,"produto_nome");?>" /><input type="hidden" name="id" value="<?php echo mysql_result($res,0,"produto_id");?>" /></td>
     </tr>
     <tr>
     	<td>Preço: </td>
        <td><input type="text" name="preco" value="<?php echo mysql_result($res,0,"produto_preco");?>"/></td>
     </tr>
     <tr>
     
     <tr>
     	<td>Banda:</td>
        <td><select name="banda"><option>Seleccione a banda</option>
        <?php
        $sql=mysql_query("select * from bandas"); 
        $n=mysql_affected_rows();
		$p_b_id=mysql_result($res,0,"produto_banda_id");
		if ($n >0 )
		{
        for($i=0;$i<$n;$i++)
        { $b_id=mysql_result($sql,$i,"banda_id");?>
        <option <?php echo ($p_b_id == $b_id?"selected":"");?> ><?php echo mysql_result($sql,$i,"banda_nome");?></option>
        
        <?php }
		} else
				echo "<option>Sem bandas</option>";?>
       
       </select></td>
     </tr>
     <tr>
     	<td>Foto: </td>
        <td><img src="imagens/produtos/<?php echo mysql_result($res,0,"produto_foto");?>"  />&nbsp;&nbsp;<input type="file" name="foto" ></td>
     </tr>
      <tr>
     	<td>Descrição: </td>
        <td><textarea name="descricao"><?php echo mysql_result($res,0,"produto_descricao");?></textarea></td>
     </tr>
     
     <tr>
     <td>Novidade: </td><td>Sim <input type="radio" <?php echo (mysql_result($res,0,"produto_novidade")=='sim'?"checked":"");?> name="novidade" value="sim" /> Não <input type="radio" <?php echo (mysql_result($res,0,"produto_novidade")=='nao'?"checked":"");?> name="novidade" value="nao" /></td></tr>
     <tr>
     <td>Promoção: </td><td> Sim <input type="radio" <?php echo (mysql_result($res,0,"produto_promo")=='sim'?"checked":"");?> name="promocao" value="sim" /> Não<input type="radio" <?php echo (mysql_result($res,0,"produto_promo")=='nao'?"checked":"");?> name="promocao" value="nao" /></td>
     </tr>
      <tr>
     	<td></td>
        <td><input type="submit" name="altera_p" value="Alterar" /><input type="reset" value="Limpar" /></td>
     </tr>
    </table>
  </form>
  </div>

<?php }else{
			header("location:gerir_produtos.php?p=not");
			exit();}
	}else{
			header("location:gerir_produtos.php?erro=pid");
			exit();}
	}
	else
			header("location:index.php?erro=5");
	
		?>
<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>

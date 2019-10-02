
<?php 

if(!isset($_SESSION['user_id']))
			session_start();

include("includes/body.php");

	top();
  

    
  if (!isset($_SESSION['user_id']))
		{header("location:index.php?erro=6");
										exit();}
										    logged();

										
									if((isset($_GET['mod'])) && ($_GET['mod'] == "not"))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Nenhum tipo de pagamento seleccionado.</font></span>"; 
				elseif((isset($_GET['form'])) && ($_GET['form'] == "not"))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar este operação. Por favor, tente novamente.</font></span>"; 
										
				c_compras();


  
   		menu();
	pesquisa();
	
	if(isset($_GET['e_id']) && $_GET['e_id'])
	{
		$verifica_estado=mysql_query("select * from encomendas where encomenda_id=".$_GET['e_id']) or die (mysql_error());
		if (mysql_affected_rows() > 0)
			$estado=mysql_result($verifica_estado,0,"encomenda_estado");
		else{header("location:index.php?e_final=not");
		exit();}
		
		if($estado == "paga" || $estado == "aguarda pagamento")
		{
			header("location:index.php?e_final=already");
			exit();
		}
		?>
		 <div style="position:absolute; left: 350px; top: 365px; width: 502px; height: 228px;">
      <table border="1" style="border-collapse:collapse; border-color:#333;"  cellpadding="3" >
	<?php
	$sql=mysql_query("select * from encomenda_produtos inner join produtos on encomenda_produtos_produto_id=produto_id inner join tamanhos on tamanho_id=encomenda_produtos_tamanho_id inner join encomendas on encomenda_id=encomenda_produtos_encomenda_id inner join clientes on encomenda_cliente_id=cliente_id where encomenda_produtos_encomenda_id=".$_GET['e_id']);
	$num=mysql_affected_rows();
	if ($num > 0)
	{ $e_id=mysql_result($sql,0,"encomenda_produtos_encomenda_id");
	?>

 

    <tr align="center" class="tableheaders">
     	<td align="center">&nbsp;</td><td align="center">Nome</td><td align="center">Tamanho</td><td align="center">Quantidade</td><td align="center">Preço unitário<td align="center">Total</td>
     </tr>
    <?php
		for ($i=0;$i<$num;$i++)
		{ ?>
     <tr align="center">
     	<td><a href="ficha_produto.php?id=<?php echo mysql_result($sql,$i,"produto_id");?>"><img src="imagens/produtos/mini/<?php echo mysql_result($sql,$i,"produto_foto");?>" /></a></td>
     	<td><label><a href="ficha_produto.php?id=<?php echo mysql_result($sql,$i,"produto_id");?>"><?php echo mysql_result($sql,$i,"produto_nome");?></a></label></td>
        <td><label><?php echo mysql_result($sql,$i,"tamanho_nome");?></label></td>
        <td><label><?php echo mysql_result($sql,$i,"encomenda_produtos_produto_quantidade");?></label></td>
        <td><label><?php echo mysql_result($sql,$i,"produto_preco");?> €</label></td>
        <td><label><?php echo mysql_result($sql,$i,"encomenda_produtos_produto_total");?> €</label></td>
     </tr>
     <tr>
     <td colspan="6"> <?php echo mysql_result($sql,$i,"cliente_nome")."<br>".mysql_result($sql,$i,"cliente_morada")."&nbsp;&nbsp;".mysql_result($sql,$i,"cliente_cp")."&nbsp;".mysql_result($sql,$i,"cliente_localidade");?>
     </td></tr>
 	<tr><td colspan="6"></td></tr>
      <tr><td colspan="5"><font style="font-size:16px;"><b>Portes:</td><td><form method="post" action="exe_finaliza_encomenda.php"><input type="hidden" name="id"  value="<?php echo $e_id;?>" />
      <input type="hidden" name="nome"  value="<?php echo mysql_result($sql,$i,"cliente_nome");?>" /><select name="modo_paga" >
        <option value="none" selected="selected">Tipo de pagamento</option>
        <option value="tb">Transferência bancária</option>
        <option value="ce">Contra-entrega</option>
      </select></td></tr>
      <tr><td colspan="5"><font style="font-size:16px;"><b>Valor total a pagar: </b></font></td><td align="center"><input  type="submit" value="Dar seguimento" name="finaliza_encomenda_go" /></td></tr>
   </form>
      </tr>
     <?php }?>
	 </table><?php
	}
	else
	{
		header("location:carrinho_compras.php?cart=empty");
		exit();
	}
	 ?>




  
  </div>
  
  <?php }else
  	{
		header("location:carrinho_compras.php?erro=id");
		exit();
	}
?>
<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>
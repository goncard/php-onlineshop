
<?php 
	if(!isset($_SESSION['user_id']))
			session_start();

include("includes/body.php"); 


		top();
  
  if (!isset($_SESSION['user_id']))
		{
	  header("location:index.php?erro=6");
	  exit();}
	      logged();

  
  
  
			 if((isset($_GET['del_p_cart'])) && ($_GET['del_p_cart'] == "done"))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#000066'>Produto eliminado do carrinho de compras com sucesso!</font></span>"; 
				elseif((isset($_GET['erro'])) && ($_GET['erro'] == "id"))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar este operação. Por favor, tente novamente.</font></span>"; 
				elseif((isset($_GET['qtd'])) && ($_GET['qtd'] == "done"))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#000066'>Quantidade alterada com sucesso!</font></span>"; 
				elseif((isset($_GET['qtd'])) && ($_GET['qtd'] == "not"))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar a alteração, por favor tente novamente.</font></span>"; 
				elseif((isset($_GET['del_car'])) && ($_GET['del_car'] == "done"))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#000066'>Carrinho de compras limpo com sucesso.</font></span>"; 
				elseif((isset($_GET['cart'])) && ($_GET['cart'] == "empty"))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Não é possível finalizar uma encomenda vazia.</font></span>"; 
  				elseif((isset($_GET['erro'])) && ($_GET['erro'] == "qtd"))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Para alterar a quantidade do produto terá de digitar uma diferente da actual.</font></span>"; 
   		menu();
			
	pesquisa();
	
	
	
	
	if(!isset($_GET['p']))
	{header("location:index.php?erro=9");
	exit(); }
	
	
	
	//paginacao
		$produtos_pagina=4;
	
		$pagina = $_GET['p']; 
			if (!$pagina) {
  			 $pagina = 1;
				}
			$primeiro = ($pagina*$produtos_pagina) - $produtos_pagina;
	
	
	
	
	?>

  <div style="position:absolute; left: 434px; top: 342px; width: 502px; height: 228px;">
  <div align="center" style="position:absolute; left: -30px; top: 30px;"><img src="imagens/carro.jpg" width="345" height="41"/></div>
   <div style="left:-30px; top:80px; position:absolute;"> 
    <table border="1" align="center" style="border-collapse:collapse; border-color:#333;"  cellpadding="3" >
      
     
     <?php 
	 
	
	 $res=mysql_query("select * from encomenda_produtos inner join produtos on encomenda_produtos_produto_id=produto_id inner join tamanhos on encomenda_produtos_tamanho_id=tamanho_id inner join encomendas on encomenda_produtos_encomenda_id=encomenda_id inner join clientes on encomenda_cliente_id=cliente_id where cliente_id=".$_SESSION['user_id']." and encomenda_estado='por finalizar' limit $primeiro, $produtos_pagina") or die (mysql_error());
	 $num=mysql_affected_rows();
	 if ($num > 0)
	 {	 $encomenda_id=mysql_result($res,0,"encomenda_id");
	 	 $res1=mysql_query("select sum(encomenda_produtos_produto_total) as total_paga from encomenda_produtos where encomenda_produtos_encomenda_id=$encomenda_id") or die (mysql_error());
	 	 $total_paga=mysql_result($res1,0,"total_paga");
?><tr align="center" class="tableheaders">
     	<td>&nbsp;</td><td>Nome</td><td>Tamanho</td><td>Quantidade</td><td>Preço unitário<td width="40">Total</td><td>&nbsp;</td>
     </tr><?php
	 for ($i=0;$i<$num;$i++)
	 { 
	 $quant=mysql_result($res,$i,"encomenda_produtos_produto_quantidade");
	 $preco=mysql_result($res,$i,"produto_preco");
	 $total=$preco*$quant;
	 ?>
    
     <tr align="center">
     <td><a href="ficha_produto.php?id=<?php echo mysql_result($res,$i,"produto_id");?>"><img src="imagens/produtos/mini/<?php echo mysql_result($res,$i,"produto_foto");?>"></a></td>
         <td><a href="ficha_produto.php?id=<?php echo mysql_result($res,$i,"produto_id");?>"><?php echo mysql_result($res,$i,"produto_nome");?></a></td>
        <td><?php echo mysql_result($res,$i,"tamanho_nome");?></td>
        <td><form method="post" action="exe_alt_qtd.php"><input type="hidden" name="e_id" value="<?php echo mysql_result($res,$i,"encomenda_id");?>" /><input type="hidden" name="t_id" value="<?php echo mysql_result($res,$i,"tamanho_id");?>" /><input type="hidden" name="p_id" value="<?php echo mysql_result($res,$i,"produto_id");?>" /><input type="text" style="text-align:center;" size="2"  maxlength="5" name="qtd" value="<?php echo mysql_result($res,$i,"encomenda_produtos_produto_quantidade");?>"><input type="submit" value="Alterar" name="ch_qtd" /></form></td>
        <td><?php echo mysql_result($res,$i,"produto_preco");?> €</td>
        <td><?php echo $total;?> €</td>
        <td><input type="button" value="Remover" onclick="window.location.href='remove_p_carro.php?p_id=<?php echo mysql_result($res,$i,'produto_id');?>&e_id=<?php echo mysql_result($res,$i,'encomenda_id');?>&t_id=<?php echo mysql_result($res,$i,'tamanho_id');?>';" /></td>
     </tr>
     <?php }
	 
	 ?><tr><td colspan="6" align="right"><font style="font-size:16px;"><b>Total a pagar: </b><b><?php echo $total_paga;?> €</b></font></td><td></td></tr>
     <tr><td colspan="6" align="right"><input type="button" value="Limpar carrinho de compras" onclick="window.location.href='limpa_carrinho.php?e_id=<?php echo $encomenda_id;?>';" /><input type="button" value="Finalizar encomenda" onclick="window.location.href='finaliza_encomenda.php?e_id=<?php echo $encomenda_id;?>';"  /></td><td></td></tr><?php }else
	 	echo "<tr><td align='center' width='200'>Sem produtos</td></tr>";?>

    </table>

		<?php $tot=mysql_query("select count(*) from encomenda_produtos inner join encomendas on encomenda_produtos_encomenda_id=encomenda_id where encomenda_cliente_id=".$_SESSION['user_id']." and encomenda_estado='por finalizar'") or die (mysql_error());
		list($total_p) = mysql_fetch_array($tot);
		$total_pag = $total_p/$produtos_pagina;
		$prev = $pagina - 1;
		$next = $pagina + 1;
		//anterior
		if ($pagina > 1) {
		$prev_l = "<a href=\"$_SERVER[PHP_SELF]?p=$prev\">Anterior</a>";
		} else {
		$prev_l = "Anterior";
			}
		//seguinte	
		if ($total_pag > $pagina) {
			$next_l = "<a href=\"$_SERVER[PHP_SELF]?p=$next\">Seguinte</a>";
			} else { 
			$next_l = "Seguinte";
				}
				
				
		$total_pag = ceil($total_pag);
		$painel = "";
		for ($x=1; $x<=$total_pag; $x++) {
  		if ($x==$pagina) { 
  		$painel .= " [$x] ";
 				 } else {
   		$painel .= " <a href=\"$_SERVER[PHP_SELF]?p=$x\">[$x]</a>";
 			 }
			}
			
			
		echo "<div>&nbsp;</div><div align='center'>$prev_l | $painel | $next_l</div>";
             
             
             
             ?>


    </div>
    
    
    
    
    
  </div>
     
     

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>
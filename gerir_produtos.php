<?php
include("includes/body.php");
 
  top();		
  
   		menu();
	pesquisa();
	    logged();

	
	if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] == 'admin'))
	{menu_admin();
	
	
	if(!isset($_GET['p']))
	{
		header("location:index.php?erro=9");
		exit();
	}
	//paginacao
		$produtos_pagina=5;
	
		$pagina = $_GET['p']; 
			if (!$pagina) {
  			 $pagina = 1;
				}
			$primeiro = ($pagina*$produtos_pagina) - $produtos_pagina;	
				
	
	
	
	
	$res=mysql_query("select * from produtos inner join bandas on produto_banda_id=banda_id limit $primeiro, $produtos_pagina");
	$num=mysql_affected_rows();
	
	if((isset($_GET['add_p'])) && ($_GET['add_p'] == 'done'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#000099'>Produto adicionado com sucesso!</font></span>"; 
				elseif((isset($_GET['form'])) && ($_GET['form'] == 'not'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#CC0000'>Por favor preencha no mínimo os campos obrigatórios do formulário<br> de registo de novo produto.</font></span>"; 
				elseif((isset($_GET['p'])) && ($_GET['p'] == 'not'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#CC0000'>Produto inexistente.</font></span>"; 
				elseif((isset($_GET['erro'])) && ($_GET['erro'] == 'pid'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar este operação. Por favor, tente novamente.</font></span>"; 
				elseif((isset($_GET['alt_p'])) && ($_GET['alt_p'] == 'done'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#000099'>Produto alterado com sucesso!</font></span>"; 
				elseif((isset($_GET['del_p'])) && ($_GET['del_p'] == 'done'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#000099'>Produto eliminado com sucesso!</font></span>"; 
			    elseif((isset($_GET['erro'])) && ($_GET['erro'] == 'ext'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#CC0000'>Só são permitidas fotos do tipo jpg ou png.</font></span>";	
				elseif((isset($_GET['erro'])) && ($_GET['erro'] == 'size'))
				echo "<span style='left:410px;top:395px;position:absolute;'s><font size='3' color='#CC0000'>O tamanho da foto não pode exceder 100Kb</font></span>";	
				
				
				
			
				
				
				
				
	?>
    <div style="left:400px; top:320px; position:absolute;"><img src="imagens/g_produtos.jpg" border="0" /></div>
	<div style="left:300px; top:520px; position:absolute;">
    <table cellpadding="3"  border="1" style="border-collapse:collapse; border-color:#333;"><tr>
	<?php if($num>0)
	{
	?>
  
     
     	<td class="tableheaders">&nbsp;</td>
        <td class="tableheaders">ID</td>
        <td width="80" class="tableheaders">Nome</td>
        <td width="100" class="tableheaders">Descrição</td>
        <td class="tableheaders">Banda</td>
        <td class="tableheaders">Novidade</td>
        <td class="tableheaders">Promoção</td>
        <td class="tableheaders">Preço</td>
        <td width="62">&nbsp;</td>
     </tr>
    <?php for($i=0;$i<$num;$i++)
	 {
		 ?>
     <tr>
     	<td align="center"><a href="ficha_produto.php?id=<?php echo mysql_result($res,$i,"produto_id");?>"><img src="imagens/produtos/mini/<?php echo mysql_result($res,$i,"produto_foto");?>" /></a></td>
             	<td align="center"><?php echo mysql_result($res,$i,"produto_id");?></td>

     	<td align="center"><a href="ficha_produto.php?id=<?php echo mysql_result($res,$i,"produto_id");?>"><?php echo mysql_result($res,$i,"produto_nome");?></a></td>
     	<td align="center"><?php echo mysql_result($res,$i,"produto_descricao");?></td>
        <td align="center"><?php echo mysql_result($res,$i,"banda_nome");?></td> 
        <td align="center"><input type="checkbox" <?php echo (mysql_result($res,$i,"produto_novidade")=='sim'?"checked":"");?> /></td>
        <td align="center"><input type="checkbox" <?php echo (mysql_result($res,$i,"produto_promo")=='sim'?"checked":"");?> /></td>
        <td align="center"><?php echo mysql_result($res,$i,"produto_preco");?>€</td>  
        <td align="center"><input type="button" value="Alterar" onclick="document.location.href='form_alterar_produto.php?id=<?php echo mysql_result($res,$i,"produto_id");?>';" title="Clique aqui para alterar os dados referentes ao produto" />
        <input type="button" value="Eliminar" onclick="if (con('produto'))
        													document.location.href='exe_eliminar_produto.php?id=<?php echo mysql_result($res,$i,"produto_id");?>';" title="Clique aqui para eliminar o produto" /></td>
     </tr>
     <?php }
      }else
	 		echo "<tr><td align='center'>Sem produtos</td></tr>";?>
             </table>
             <div>&nbsp;</div><div align="right"><input type="button" title="Clique aqui para adicionar um novo produto" value="Adicionar novo produto" onclick="document.location.href='form_adicionar_produto.php';" /></div>
             
             
             <?php $tot=mysql_query("select count(*) from produtos") or die (mysql_error());
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
<?php
	
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

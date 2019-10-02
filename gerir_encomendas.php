
<?php 


include("includes/body.php"); 
		top();
  

   		menu();
	pesquisa();
	    logged();

	if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] == 'admin'))
	{menu_admin();
	
	if(!isset($_GET['p']))
	{header("location:index.php?erro=9");
	exit(); }
	
	
	
	//paginacao
		$produtos_pagina=10;
	
		$pagina = $_GET['p']; 
			if (!$pagina) {
  			 $pagina = 1;
				}
			$primeiro = ($pagina*$produtos_pagina) - $produtos_pagina;	
				
	
	
	
	
	
	
	
	
	if((isset($_GET['erro'])) && ($_GET['erro'] == 'eid'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar este operação. Por favor, tente novamente.</font></span>"; 
	
	
	$res=mysql_query("select * from encomendas inner join clientes on encomenda_cliente_id=cliente_id order by encomenda_data limit $primeiro, $produtos_pagina") or die (mysql_error());
	$num=mysql_affected_rows();
	  ?><div style="left:400px; top:320px; position:absolute;"><img src="imagens/g_enc.jpg" border="0" /></div><div style="left:280px; top:510px; position:absolute;"> 
      <table cellpadding="3" align="center" border="1" style="border-collapse:collapse; border-color:#333;">
<?php
	if($num>0)
	{
	?>
   		
     <tr>
     	<td class="tableheaders">ID</td>
        <td class="tableheaders" width="100">Nome do cliente</td>
        <td width="200" class="tableheaders">Morada do cliente</td>
        <td class="tableheaders">Data</td>
        <td class="tableheaders">Estado</td>
        <td class="tableheaders">Pagamento</td>
        <td >&nbsp;</td>
     </tr>
     <?php for($i=0;$i<$num;$i++)
	 {
		 ?>
     <tr>
     	<td><?php echo mysql_result($res,$i,"encomenda_id");?></td>
     	<td ><?php echo mysql_result($res,$i,"cliente_nome");?></td>
        <td ><?php echo mysql_result($res,$i,"cliente_morada")."   ".mysql_result($res,$i,"cliente_cp")." ".mysql_result($res,$i,"cliente_localidade");?></td>
     	<td><?php echo mysql_result($res,$i,"encomenda_data");?></td>
        <td><?php echo mysql_result($res,$i,"encomenda_estado");?></td>   
        <td ><?php  if(mysql_result($res,$i,"encomenda_mod_paga")=="ce") echo "Contra-entrega";elseif(mysql_result($res,$i,"encomenda_mod_paga")=="tb") echo "Transf. bancária";?></td>     
        <td align="center"><input type="button" title="Clique aqui para eliminar a encomenda" value="Eliminar" onclick="if(con('encomenda') == true)
        																													document.location.href='exe_eliminar_encomenda.php?id=<?php echo mysql_result($res,$i,"encomenda_id");?>';" /></td>
     </tr>
     <?php } ?>

    
  
  
<?php } else {
			echo "<tr><td width='200'>Sem encomendas</td></tr>";}
			
			?> </table>
            
            
            
            <?php $tot=mysql_query("select count(*) from encomendas") or die (mysql_error());
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
            
            
            
            
            
            
            
            
            </div><?php
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

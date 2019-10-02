<?php 
	include("includes/body.php");
	top();
  
 
   		menu();
	pesquisa();
	    logged();

	
	if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] == 'admin'))
	{menu_admin();
	
	
	
				if((isset($_GET['del_c'])) && ($_GET['del_c'] == 'done'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#000099'>Utilizador eliminado com sucesso!</font></span>";
				elseif((isset($_GET['erro'])) && ($_GET['erro'] == 'cid'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar este operação. Por favor, tente novamente.</font></span>";
	
	
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
	
	
	
	$res=mysql_query("select * from clientes limit $primeiro,$produtos_pagina") or die (mysql_error());
	$num=mysql_affected_rows();
	
	
	?><div style="left:400px; top:320px; position:absolute;"><img src="imagens/g_clientes.jpg" border="0" /></div>
    <div style="left:245px; top:510px; position:absolute;">
    <table cellpadding="3" border="1" style="border-collapse:collapse; border-color:#333;">
<?php	if($num > 0)
	{
	?>
     <tr align="center">
             <td class="tableheaders">ID</td>

        <td class="tableheaders" width="100">Nome</td>
        <td class="tableheaders" width="200">Morada</td>
        <td class="tableheaders">Telefone</td>
        <td class="tableheaders">E-mail</td>
        <td class="tableheaders">NIF</td>
        <td class="tableheaders">Nº Enc.</td>
        <td></td>
     </tr>
     <?php for($i=0;$i<$num;$i++)
	 { $cliente_id=mysql_result($res,$i,"cliente_id");
	   $encomendas=mysql_query("select * from encomendas where encomenda_cliente_id=".$cliente_id." and (encomenda_estado='paga' or encomenda_estado='aguarda pagamento')") or die (mysql_error());
       $cont=mysql_num_rows($encomendas);   ?>		
     <tr align="center">
             <td ><?php echo mysql_result($res,$i,"cliente_id");?></td>

     	<td><?php echo mysql_result($res,$i,"cliente_nome");?></td>
     	 <td ><?php echo mysql_result($res,$i,"cliente_morada")."   ".mysql_result($res,$i,"cliente_cp")." ".mysql_result($res,$i,"cliente_localidade");?></td>

        <td><?php echo mysql_result($res,$i,"cliente_telefone");?></td>
        <td><?php echo mysql_result($res,$i,"cliente_email");?></td>
                <td><?php echo mysql_result($res,$i,"cliente_nif");?></td>
                <td><?php echo $cont;?></td>

        <td align="center"><input type="button" value="Eliminar" onclick="if(con('cliente') == true)
        																						document.location.href='exe_eliminar_utilizador.php?id=<?php echo mysql_result($res,$i,"cliente_id");?>';" title="Clique aqui para eliminar a conta do cliente" /></td>
     </tr>
     <?php } ?>
<?php }
		else 
			echo "<tr><td>Sem clientes</td></tr>";
			
			
	?>     
     </table>
  
  
  
  
  
  
   <?php $tot=mysql_query("select count(*) from clientes") or die (mysql_error());
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
			{header("location:index.php?erro=5");
			exit();}
			?>
<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>

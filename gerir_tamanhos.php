<?php 
	include("includes/body.php");
	top();
  
  
  
   		menu();
	pesquisa();
	    logged();

	
	if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] == 'admin'))
	{menu_admin();
	if((isset($_GET['add_t'])) && ($_GET['add_t'] == 'done'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#000099'>Tamanho adicionado com sucesso!</font></span>"; 
				elseif((isset($_GET['form'])) && ($_GET['form'] == 'not'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#CC0000'>Por favor preencha correctamente o formulário.</font></span>"; 
				elseif((isset($_GET['tamanho'])) && ($_GET['tamanho'] == 'not'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#CC0000'>Tamanho inexistente.</font></span>"; 
				elseif((isset($_GET['erro'])) && ($_GET['erro'] == 'tid'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar este operação. Por favor, tente novamente.</font></span>"; 
				elseif((isset($_GET['alt_t'])) && ($_GET['alt_t'] == 'done'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#000099'>Banda alterada com sucesso!</font></span>";
				elseif((isset($_GET['del_t'])) && ($_GET['del_t'] == 'done'))
				echo "<span style='left:410px;top:395px;position:absolute;'><font size='3' color='#000099'>Banda eliminada com sucesso!</font></span>";
	
	
	
	
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
	
	
	
	
	
		?>	            <div style="left:400px; top:320px; position:absolute;"><img src="imagens/g_tamanhos.jpg" border="0" /></div>


			<div style="left:460px; top:480px; position:absolute;">
    <table cellpadding="3" align="left" border="1" style="border-collapse:collapse; border-color:#333;">
        <?php
	$res=mysql_query("select * from tamanhos limit $primeiro, $produtos_pagina");
	$num=mysql_affected_rows();
	if($num>0)
	{
	?>
  
     <tr>
        <td align="center" class="tableheaders" >Nome</td>
        <td>&nbsp;</td>
     </tr>
     <?php for($i=0;$i<$num;$i++)
	 {
		 ?>
     <tr>
     	
     	<td align="center"><?php echo mysql_result($res,$i,"tamanho_nome");?></td>
        <td align="center"><input type="button" value="Alterar" title="Clique aqui para alterar os dados relativos ao tamanho" id="b_alterar_tamanho" onclick="document.location.href='form_alterar_tamanho.php?id=<?php echo mysql_result($res,$i,"tamanho_id");?>';" />
        <input type="button" value="Eliminar" title="Clique aqui para eliminar o tamanho" id="b_eliminar_tamanho" onclick="if(con('tamanho') == true)
        																															document.location.href='exe_eliminar_tamanho.php?id=<?php echo mysql_result($res,$i,"tamanho_id");?>';" />
     </tr>
     <?php } ?>

    
  
  
<?php } else 
			echo "<tr><td align='center'>Sem tamanhos</td></tr>";
			
	}
	else
		header("location:index.php?erro=5");
		?>
 </table>
 <div>&nbsp;</div><div align="right"><input type="button" title="Clique aqui para adicionar um novo tamanho" value="Adicionar novo tamanho" onclick="document.location.href='form_adicionar_tamanho.php';" /></div>
 
 
 
 
 <?php $tot=mysql_query("select count(*) from tamanhos") or die (mysql_error());
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
<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>

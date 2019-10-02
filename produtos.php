<?php 
	include("includes/body.php");
	top();
  
      logged();

  


if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "admin")
	{
		c_compras();
}
elseif($_SESSION['user_id'] == "admin")
	menu_admin();
	else
	login();
 
				 
   		menu();
		
		
	pesquisa();
	
	
	
	if(!isset($_GET['p']))
	{
		header("location:index.php?erro=9");
		exit();
	}
	//paginacao
		$produtos_pagina=9;
	
		$pagina = $_GET['p']; 
			if (!$pagina) {
  			 $pagina = 1;
				}
			$primeiro = ($pagina*$produtos_pagina) - $produtos_pagina;	
	
	
	
	
	
	
	
	
	
	
	
	$res = mysql_query("select * from produtos limit $primeiro, $produtos_pagina");
	$num = mysql_affected_rows();




	?>

     <div id="listaprod">
     <div>&nbsp;</div>
     <div>&nbsp;</div>
     <div><img src="imagens/lista.jpg" /></div>
     <div>&nbsp;</div>
     <table align="center" style="border-collapse:collapse; border-color:#333;">
     <tr>
    
     
      <?php 
	  
	  $i=1;
	  
	  if($num > 0)
	{
	
	
	while($row=mysql_fetch_array($res)){ 
	
	
    
			if ($i <= 3)
			{
				?>
                <td align="center"><form method="post" action="adiciona_carrinho.php" > 
     	<div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><img src="imagens/produtos/mini/<?php echo $row['produto_foto'];?>" /></a></div>
        
        <input type="hidden" name="id" value="<?php echo $row['produto_id'];?>" />
       <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><?php echo $row['produto_nome'];?></a></div>
       <div><b><font style="font-size:15px;"> <?php echo $row['produto_preco'];?> €</font></b></div>
       <div><select name="tamanho" class="botaotbl" >
        <option value="none">Tamanho</option>
        <?php 
        $sql=mysql_query("select * from tamanhos");
		$num=mysql_affected_rows();
		for ($conta=0;$conta<$num;$conta++)
		{
		?><option value="<?php echo mysql_result($sql,$conta,"tamanho_id");?>"><?php echo mysql_result($sql,$conta,"tamanho_nome");?></option>
  <?php } ?>
        </select>
        <select name="qtd" style="width:100px; font-family:Calibri;">
        <option value="none">Quantidade</option>
        <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option>

		</select>



        <input class="botaotbl" type="submit" value="Comprar" name="carrinho_go" /> </form></div>
        
        </td>
    <?php } 
			else{
				?>
     			</tr><tr><td align="center"><form method="post" action="adiciona_carrinho.php" > 
                <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><img src="imagens/produtos/mini/<?php echo $row['produto_foto'];?>" /></a></div>
                
                <input type="hidden" name="id" value="<?php echo $row['produto_id'];?>" />

       <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><?php echo $row['produto_nome'];?></a></div>
    		       <div><b><font face="Calibri" style="font-size:15px;"> <?php echo $row['produto_preco'];?> €</font></b></div>
    
        
        <div><select name="tamanho" style="font-family:Calibri; width:90px; ">
        <option value="none">Tamanho</option>
        <?php 
        $sql=mysql_query("select * from tamanhos");
		$num=mysql_affected_rows();
		for ($conta=0;$conta<$num;$conta++)
		{
		?><option><?php echo mysql_result($sql,$conta,"tamanho_nome");?></option>
  <?php } ?>
        </select>
        <select name="qtd" style="width:100px; font-family:Calibri;">
        <option value="none">Quantidade</option>
        <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option>

		</select>



        <input type="submit" class="botaotbl" value="Comprar" name="carrinho_go" /></form></div>
        
        </td>
        
        
        
    <?php  
			$i=1;}
			$i++;
			
			
	}
	
	
	}else
		echo "<tr><td>Sem produtos</td></tr>";
	  ?>
	  
	  
	  
	  
	  
	  
	  
	  
	  

	  
	  
	  
     </table>
     
     
     
     
     
     
     
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
     

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>
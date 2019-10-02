<?php 
	include("includes/body.php");
	
	
	top();
  
     logged();


if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "admin")
	{		c_compras();
}
else{
	login();}
  
   		menu();
	pesquisa();
	
	
	//paginacao
		$produtos_pagina=9;
	
		$pagina = $_GET['p']; 
			if (!$pagina) {
  			 $pagina = 1;
				}
			$primeiro = ($pagina*$produtos_pagina) - $produtos_pagina;
	
	
	if(isset($_POST['form_pesquisa']))
	{
		





		 
		$search_nome=strtolower($_POST['produto_nome']);
		$search_band=strtolower($_POST['banda_nome']);
	

		
		if($search_nome != "nome do produto" && $search_nome != "" && $search_band == "")
		{
			
			$res=mysql_query("select * from produtos inner join bandas on produto_banda_id=banda_id where produto_nome like '%$search_nome%' limit $primeiro, $produtos_pagina") or die (mysql_error());
			$num=mysql_affected_rows();
		}
		elseif(($search_nome == "" || $search_nome == "nome do produto") && $search_band != "")	
		{
			
			$res=mysql_query("select * from produtos inner join bandas on produto_banda_id=banda_id where banda_nome like '%$search_band%' limit $primeiro, $produtos_pagina") or die (mysql_error());
			$num=mysql_affected_rows();
		}
		elseif($search_nome != "" && $search_nome != "nome do produto" && $search_band != "")
		{
			
			$res=mysql_query("select * from produtos inner join bandas on produto_banda_id=banda_id where produto_nome like '%$search_nome%' and banda_nome like '%$search_band%' limit $primeiro, $produtos_pagina") or die (mysql_error());
			$num=mysql_affected_rows();
		
			
		}else
			{
				$res=mysql_query("select * from produtos limit $primeiro, $produtos_pagina") or die (mysql_error());
				$num=mysql_affected_rows();
				
			}
			
			
	
				
			
	$i=1;
	?>
	
	<div style="position:absolute; left: 368px; top: 343px; width: 502px; height: 228px;">
    <div><img src="imagens/pes.jpg" border="0" /></div><div>&nbsp;</div>
    <table align="center" style="border-collapse:collapse; border-color:#333;">
	<tr><?php
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
                <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><img src="imagens/produtos/mini/<?php echo $row['produto_foto'];?>" width="110" height="110"/></a></div>
                
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
		echo "<tr><td>Nenhum produto encontrado</td>";
	?>
	</tr></table>
    
    <?php
    
    	$tot=mysql_query("select count(*) from produtos") or die (mysql_error());
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
			
			
		echo "<div>&nbsp;</div><div>&nbsp;</div><div align='center'>$prev_l | $painel | $next_l</div>";
		
		?>
    
    
    
    
    
    
    
  </div> 
	
    
    
<?php

	}

 else
		header("location:index.php?erro=9");
	
    ?>

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>
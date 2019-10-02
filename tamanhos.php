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
	
	?>

     <div style="position:absolute; left: 468px; top: 357px; width: 358px; height: 228px;">
     <div><img src="imagens/tamanhos.jpg" /></div>
     <div>&nbsp;</div>
     <table cellpadding="3" border="1" style="border-collapse:collapse; border-color:#333;">
     
     <tr>
     	<td  colspan="3"><b>Dimensões dos tamanhos dos produtos (Largura x Comprimento)</b></td>
     </tr>
     <tr>
     	<td>&nbsp;</td>
        <td >Homem</td>
        <td >Mulher</td>
     </tr>
     <tr>
     	<td >S</td>
        <td>45x68 cm</td>
        <td>35x48 cm</td>
     </tr>
     <tr>
     	<td >M</td>
        <td>49x71 cm</td>
        <td>40x55 cm</td>
     </tr>
     <tr>
     	<td >L</td>
        <td>55x76 cm</td>
        <td>43x55 cm</td>
     </tr>
       <tr>
     	<td>XL</td>
        <td>61x79 cm</td>
        <td>&nbsp;</td>
     </tr>
     </table>
  </div>
     

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>
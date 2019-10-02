
<?php include("includes/body.php");


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
	
	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
					menu_admin();
	
	?>

  <div style="position:absolute; left: 371px; top: 338px; width: 502px; height: 228px; background-image:url(imagens/tabel.jpg);">
    <table width="495" height="308" align="left" border="0" cellpadding="3" cellspacing="3">
     
     <tr>
     	<td height="22"><font style="font-size:14px"><b>Quanto tempo demoram as encomendas a chegar?</b></font></td>
     </tr>
     <tr>
     	<td height="32">Todas as encomendas são enviadas quando os produtos estiverem disponíveis. Mas se houver em stock a encomenda é enviada dentro de 2/3 dias.</td>
     <tr>
     	<td>&nbsp;</td>
     </tr>
     <tr>
     	<td height="23"><font style="font-size:14px"><b>Quais os métodos de pagamento? </b></font></td></tr>
     <tr><td height="21">Apenas aceitamos pagamentos através de transferência bancária ou contra-entrega.</td></tr>
     <tr>
     	<td>&nbsp;</td>
     </tr>
     <tr>
     	<td height="25"><font style="font-size:14px"><b>É possível cancelar uma encomenda?</b></font></td></tr>
     <tr>
     	<td height="39">Sim, terá apenas que nos comunicar o assunto para o nosso e-mail (apocalyptic_online@hotmail.com).</td></tr>
     <tr>
     	<td>&nbsp;</td>
     </tr>
     <tr>
     	<td height="23"><font style="font-size:14px"><b>É possível devolver produtos?</b></font></td></tr>
     <tr>
     	<td height="43">Sim, terá de enviar o produto para a nossa morada(), ficando o valor dos portes a seu encargo. E tem a possibilidade de trocar por outro produto ou ter o seu dinheiro.</td></tr>
    
   </table>
  </div>
     
     

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>
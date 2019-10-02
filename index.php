<?php 
	include("includes/body.php");
	top();?>
    
	
<?php
     
  	 
    logged();
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "admin")
	{
		c_compras();
}
elseif(isset($_SESSION['user_id']) && $_SESSION['user_id'] == "admin"){
	menu_admin();}
	
	else{
		login();}
	
		 if((isset($_GET['erro'])) && ($_GET['erro'] == 1))
				echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>E-mail ou password errados, tente novamente por favor.</font></span>"; 
				elseif((isset($_GET['erro'])) && ($_GET['erro'] == 2))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar os dados de inicio de sessão,<br> tente novamente por favor.</font></span>";
				elseif((isset($_GET['registo'])) && ($_GET['registo'] == 'done'))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#000099'>Registo efectuado com sucesso! <br />
Por favor verifique a caixa de entrada e o lixo electronico do seu<br /> e-mail para activar a sua conta
 através da nossa mensagem de e-mail.</font></span>";
 				elseif((isset($_GET['erro'])) && ($_GET['erro'] == 4))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Por favor verifique o seu e-mail para poder activar a sua<br> conta de utilizador correctamente.</font></span>";
				elseif((isset($_GET['registo'])) && ($_GET['registo'] == 'not'))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar o seu registo. Por favor<br> tente novamente. Alguma dúvida não hesite em contactar-nos.</font></span>";
				elseif((isset($_GET['validacao'])) && ($_GET['validacao'] == 'done'))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#000099'>A sua conta está agora activada!</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == 5))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Para aceder a essa página é necessário estar em sessão como administrador.</font></span>";
					elseif((isset($_GET['validacao'])) && ($_GET['validacao'] == 'alreadydone'))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>A sua conta já está activada, não é necessário fazê-lo de novo.</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == 6))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Para aceder a esta página, é necessário iniciar a sua sessão.</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == 7))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Para iniciar sessão é necessário activar a sua conta primeiro.</font></span>";
					elseif((isset($_GET['form_cart'])) && ($_GET['form_cart'] == "not"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Para adicionar um produto ao seu carrinho de compras, terá de <br>seleccionar a quantidade e tamanho pretendidos.</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == 8))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Por favor inicie a sua sessão.</font></span>";
					elseif((isset($_GET['add_cart'])) && ($_GET['add_cart'] == "done"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#000099'>Produto adicionado ao carrinho de compras!</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == 9))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Ocorreu um erro ao processar esta operação. Por favor tente novamente.</font></span>";
					elseif((isset($_GET['erro'])) && ($_GET['erro'] == 10))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Não tem permissões para aceder aos dados de outros utilizadores.</font></span>";
					elseif((isset($_GET['reg_erro'])) && ($_GET['reg_erro'] == "mail"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>O e-mail que introduziu não é válido ou já está a ser utilizado.</font></span>";
					elseif((isset($_GET['reg_erro'])) && ($_GET['reg_erro'] == "pass"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>A palavra-passe que introduziu não é válida.<br> Lembre-se que terá de repetir a palavra-passe no respectivo campo.</font></span>";
					elseif((isset($_GET['reg_erro'])) && ($_GET['reg_erro'] == "nome"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>O nome que introduziu não é válido.</font></span>";
					elseif((isset($_GET['reg_erro'])) && ($_GET['reg_erro'] == "address"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>A morada que introduziu não é válida.</font></span>";
					elseif((isset($_GET['reg_erro'])) && ($_GET['reg_erro'] == "cp"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>O código postal que introduziu não é válido.</font></span>";
					elseif((isset($_GET['e_final'])) && ($_GET['e_final'] == "done"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#000099'>Encomenda finalizada. Por favor verifique o seu e-mail.</font></span>";
					elseif((isset($_GET['e_final'])) && ($_GET['e_final'] == "not"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Encomenda inexistente.</font></span>";
				    elseif((isset($_GET['e_final'])) && ($_GET['e_final'] == "already"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Encomenda já finalizada.</font></span>";
					 elseif((isset($_GET['f_prod'])) && ($_GET['f_prod'] == "not"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Produto inexistente.</font></span>";
 					 elseif((isset($_GET['pr'])) && ($_GET['pr'] == "user"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#CC0000'>Não é possível recuperar a palavra-passe com a sessão iniciada.</font></span>";				
					 elseif((isset($_GET['pr'])) && ($_GET['pr'] == "done"))
					echo "<span style='left:410px;top:320px;position:absolute;'><font size='3' color='#000066'>A sua nova palavra-passe foi enviada para o seu e-mail.</font></span>";				
		
   		
		menu();		
	pesquisa();
	

	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
					{menu_admin();
					admin_title();}
					else
						index_user();
					?>
                    
    
      
                     
  <div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>

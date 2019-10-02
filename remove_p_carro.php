<?php 
	if(!isset($_SESSION['user_id']))
			session_start();
			
	include("includes/body.php");
	
	if(isset($_SESSION['user_id']))
	{
		if(isset($_GET['p_id']) && ($_GET['p_id'] != "") && isset($_GET['e_id']) && $_GET['e_id'] != "" && isset($_GET['t_id']) && $_GET['t_id'] != "")
		{
	$sql=mysql_query("delete from encomenda_produtos where encomenda_produtos_produto_id=".$_GET['p_id']." and encomenda_produtos_encomenda_id=".$_GET['e_id']." and encomenda_produtos_tamanho_id=".$_GET['t_id']) or die (mysql_error());
	header("location:carrinho_compras.php?p=1&del_p_cart=done");
	exit();
		}
	else
	{
		header("location:carrinho_compras.php?p=1&erro=id");		
		exit();
	}
		}
		else
			header("location:index.php?erro=5");

		
	
	?>
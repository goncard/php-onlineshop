<?php 
	if(!isset($_SESSION['user_id']))
			session_start();
			
	include("includes/body.php");
	
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
	{
		if(isset($_GET['id']) && ($_GET['id'] != ""))
		{
			$id=$_GET['id'];
			
		$cart=mysql_query("delete encomenda_produtos from encomenda_produtos inner join encomendas on encomenda_produtos_encomenda_id=encomenda_id where  encomenda_cliente_id=$id") or die (mysql_error());
			$encomenda=mysql_query("delete from encomendas where encomenda_cliente_id=".$_GET['id']) or die (mysql_error());

	$user=mysql_query("delete from clientes where cliente_id=".$_GET['id']) or die (mysql_error());

	header("location:gerir_utilizadores.php?p=1&del_c=done");
	exit();
		}
	else
	{
		header("location:gerir_utilizadores.php?p=1&erro=cid");		
		exit();
	}
		}
		else
			header("location:index.php?erro=5");

		
	
	?>
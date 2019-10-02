<?php 
	if(!isset($_SESSION['user_id']))
			session_start();
			
	include("includes/body.php");
	
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
	{
		if(isset($_GET['id']) && ($_GET['id'] != ""))
		{
	$del=mysql_query("delete from encomenda_produtos where encomenda_produtos_tamanho_id=".$_GET['id']) or die (mysql_error());
	$sql=mysql_query("delete from tamanhos where tamanho_id=".$_GET['id']) or die (mysql_error());
	header("location:gerir_tamanhos.php?p=1&del_t=done");
	exit();
		}
	else
	{
		header("location:gerir_tamanhos.php?p=1&erro=tid");		
		exit();
	}
		}
		else
			header("location:index.php?erro=5");

		
	
	?>
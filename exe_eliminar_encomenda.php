<?php
	if(!isset($_SESSION['user_id']))
			session_start();
			
	include("includes/body.php");
	
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
	{
		if(isset($_GET['id']) && ($_GET['id'] != ""))
		{
	$cart=mysql_query("delete from encomenda_produtos where encomenda_produtos_encomenda_id=".$_GET['id']) or die (mysql_error());
	$sql=mysql_query("delete from encomendas where encomenda_id=".$_GET['id']) or die (mysql_error());
	header("location:gerir_encomendas.php?p=1&del_e=done");
	exit();
	
		}
	
	else
	{
		header("location:gerir_encomendas.php?p=1&erro=eid");
		exit();		
	}
	}
	else
		header("location:index.php?erro=5");
	?>
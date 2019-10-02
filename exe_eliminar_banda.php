<?php 
	if(!isset($_SESSION['user_id']))
			session_start();
			
	include("includes/body.php");
	
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
	{
		if(isset($_GET['id']) && ($_GET['id'] != ""))
		{
	$sql=mysql_query("delete from produtos where produto_banda_id=".$_GET['id']) or die (mysql_error());
	$sql=mysql_query("delete from bandas where banda_id=".$_GET['id']) or die (mysql_error());
	header("location:gerir_bandas.php?p=1&del_b=done");
	exit();
		}
	else
	{
		header("location:gerir_bandas.php?p=1&erro=bid");		
		exit();
	}
		}
		else
			header("location:index.php?erro=5");

		
	
	?>
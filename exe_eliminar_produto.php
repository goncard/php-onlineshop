<?php 
if(!isset($_SESSION['user_id']))
			session_start();
			
include("includes/body.php");
	
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
	{
		if(isset($_GET['id']) && ($_GET['id'] != ""))
		{
			
		$image=mysql_query("select * from produtos where produto_id=".$_GET['id']) or die (mysql_error());
		$cart=mysql_query("delete encomenda_produtos from encomenda_produtos where encomenda_produtos_produto_id=".$_GET['id']) or die (mysql_error());

		$sql=mysql_query("delete from produtos where produto_id=".$_GET['id']) or die(mysql_error());
		unlink("imagens/produtos/n_".mysql_result($image,0,"produto_foto"));
		unlink("imagens/produtos/mini/".mysql_result($image,0,"produto_foto"));
		unlink("imagens/produtos/or_".mysql_result($image,0,"produto_foto"));

        header("location:gerir_produtos.php?p=1&del_p=done");
		exit();
		}else
	{
		header("location:gerir_bandas.php?p=1&erro=pid");		
		exit();
	}
		}
		else
			header("location:index.php?erro=5");

		
	
	?>
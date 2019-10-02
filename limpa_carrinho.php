<?php 
if(!isset($_SESSION['user_id']))
			session_start();
			
include("includes/body.php"); 
			
		if(isset($_SESSION['user_id']))
			{
				if(isset($_GET['e_id']) && $_GET['e_id'] != "")
					{
						$id=$_GET['e_id'];
						$del=mysql_query("delete from encomenda_produtos where encomenda_produtos_encomenda_id=$id") or die(mysql_error());
						header("location:carrinho_compras.php?p=1&del_car=done");
						exit();
					}
					else
					{ header("location:carrinho_compras.php?p=1&erro=eid");
						exit();}
			}
			else
			{
				header("location:index.php?erro=8");
			}
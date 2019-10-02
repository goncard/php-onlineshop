<?php
if(!isset($_SESSION['user_id']))
			session_start();

include("includes/body.php");

  if(isset($_POST['adiciona_b']) && isset($_POST['nome']) && $_POST['nome'] != "")
  {
  
 if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] == 'admin'))
												{


$banda=$_POST['nome'];
$sql=mysql_query("insert into bandas(banda_nome) 
				  
				 values('".$banda."')") or die (mysql_error());

	header("location:gerir_bandas.php?p=1&add_b=done");
	exit();
												}
	else
	 	header("location:index.php?erro=5");
		
  }else
  	header("location:gerir_bandas.php?p=1&add_b=not");
	
	
	?>
<?php
if(!isset($_SESSION['user_id']))
			session_start();

include("includes/body.php");

  if(isset($_POST['adiciona_t']) && isset($_POST['nome']) && $_POST['nome'] != "")
  {
  
 if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] == 'admin'))
												{


$tamanho=$_POST['nome'];
$sql=mysql_query("insert into tamanhos(tamanho_nome) 
				  
				 values('".$tamanho."')") or die (mysql_error());

	header("location:gerir_tamanhos.php?p=1&add_t=done");
	exit();
												}
	else
	 	header("location:index.php?erro=5");
		
  }else
  	header("location:gerir_tamanhos.php?p=1&form=not");
	
	
	?>
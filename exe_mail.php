<?php
if(!isset($_SESSION['user_id']))
			session_start();
			
	include("includes/body.php");
	
	
	
	 if(isset($_POST['nome']) && isset($_POST['mail']) && isset($_POST['msg']))
	 {
		 if($_POST['nome'] == "")
		  {
			  header("location:contactos.php?erro=nome");
			  exit();
		  }
		  elseif($_POST['mail'] == "" && validateEmail($_POST['mail']) == "false")
		  {
			  header("location:contactos.php?erro=mail");
			  exit();
		  }
		  elseif($_POST['msg'] == "")
		  {
			  header("location:contactos.php?erro=msg");
			  exit();
		  }
		  
		 if($_POST['assunto'] != "")
				$assunto= $_POST['assunto'];
				
	$headers .= 'From: '.$_POST['nome'].' ['.$_POST['mail'].']';
	$headers .= 'Reply-To: '.$_POST['nome'].' ['.$_POST['mail'].']';
	$msg = $_POST['msg'];
	mail("apocalyptic.online@gmail.com",$assunto,$msg,$headers);
	 
	 }else{
		 header("location:contactos.php?form=not");
		 exit();
	 }
	 
	 
	 
	 
	 ?>
<?php
	
if(!isset($_SESSION['user_id']))
			session_start();

include("includes/body.php");

if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
				   {
					   
				   

if(isset($_POST['finaliza_encomenda_go']))
{
	$id=$_POST['id'];
	$data=date("Y-m-d");

	if($_POST['modo_paga'] == "none")
	  {
		  
		  header("location:finaliza_encomenda.php?e_id=$id&mod=not");
		  exit();
	  }
	  elseif($_POST['modo_paga'] == "tb")
	  {
	  
	  $update=mysql_query("update encomendas set encomenda_mod_paga='tb', encomenda_estado='aguarda pagamento',encomenda_data='$data' where encomenda_id=$id") or die (mysql_error());

	  $assunto="Apocalyptic - A sua encomenda";
	$headers .= 'From: Apocalyptic [goncalo_card@hotmail.com]';
	$headers .= 'Reply-To: Apocalyptic [goncalo_card@hotmail.com]';
	$msg = "";
	$msg .= "Olá ".$_POST['nome']." !";
	$msg .= " A sua encomenda está agora finalizada. Entrará em seguimento para a sua morada depois de nos enviar o comprovativo de pagamento. ";
	$msg .= "<br>Para efectuar o pagamento, transfira o valor da encomenda () para o seguinte NIB: 0036 0045 48870045534 76";
	$msg .= " <br>Após o pagamento deverá enviar-nos o comprovativo de pagamento para o seguinte e-mail: apocalyptic@hotmail.com";
	$msg .= " <br>Por favor, envie-nos o documento, através do e-mail com que está registado no nosso site. Alguma dúvida, não hesite em contactar-nos.";

	$msg .= " <br>Os melhores cumprimentos.";
		mail($email,$assunto,$msg,$headers);
		header("location:index.php?e_final=done");
	exit();
	
	  }
	  elseif($_POST['modo_paga'] == "ce")
	  {
		  	  $update=mysql_query("update encomendas set encomenda_mod_paga='ce', encomenda_estado='paga', encomenda_data='$data' where encomenda_id=$id") or die (mysql_error());

		   $assunto="Apocalyptic - A sua encomenda";
	$headers .= 'From: Apocalyptic [goncalo_card@hotmail.com]';
	$headers .= 'Reply-To: Apocalyptic [goncalo_card@hotmail.com]';
	$msg = "";
	$msg .= "Olá ".$_POST['nome']." !";
	$msg .= " A sua encomenda está agora finalizada. Entrará em seguimento o mais rápido possível. ";
	$msg .= "<br>O valor a pagar pela encomenda será de: ";
	$msg .= " <br>Alguma dúvida, não hesite em contactar-nos: apocalyptic@hotmail.com";
	$msg .= " <br>Os melhores cumprimentos.";
	
	mail($email,$assunto,$msg,$headers);
		header("location:index.php?e_final=done");
	exit();
	  }
		
	 }
	 else{
		 header("location:finaliza_encomenda.php?e_id=$id&form=not");
		 exit();
	 }


				   }else
				   {
					   header("location:index.php?erro=8");
					   exit();
				   } ?>
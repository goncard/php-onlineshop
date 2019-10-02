
<?php
	if(!isset($_SESSION['user_id']))
			session_start();
			
	include("includes/body.php");
	
	
	
	if(isset($_SESSION['user_id']))
	{
		header("location:index.php?pr=user");
		exit();
		}
	
	if (isset($_POST['mail']) && isset($_POST['pass']) && $_POST['pass'] != "" && $_POST['mail'] != "")
	{
		
	$find_mail=mysql_query("select * from clientes where cliente_email='".$_POST['mail']."' and cliente_password='".$_POST['pass']."'") or die (mysql_error());
	$num=mysql_affected_rows();
	if ($num > 0)
	{
		$id=mysql_result($find_mail,0,"cliente_id");
		 $password = "";
    	 $possivel = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
   		 $i = 0;     
        while ($i < 7) { 
            $char = substr($possivel, mt_rand(0, strlen($possivel)-1), 1);        
            $password .= $char;
            $i++;
		}
						
	
	$update=mysql_query("update clientes set cliente_password='$password' where cliente_id=$id") or die (mysql_error());

	
	$assunto="Apocalyptic - Recuperação de password";
	$headers .= 'From: Apocalyptic [goncalo_card@hotmail.com]';
	$headers .= 'Reply-To: Apocalyptic [goncalo_card@hotmail.com]';
	$msg = "<br>";
	$msg .= "Olá ".mysql_result($find_mail,0,'cliente_nome');
	$msg .= " Esta é a sua nova password: ";
	$msg .= $password; 
	mail($_POST['mail'],$assunto,$msg,$headers);
	header("location:index.php?pr=done");
	exit();
	
							}
	else{
			header("location:form_recuperar_pw.php?pass=not");
			exit();
	}
	}
		else{
			header("location:form_recuperar_pw.php?form=not");
			exit();
		}
	
	
							
?>
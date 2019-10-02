<?php 
if(!isset($_SESSION['user_id']))
			session_start();


include("includes/body.php");

if(isset($_SESSION['user_id']))
	 {
function validateEmail($email){
		$result=preg_match("^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$^",$email);
		$query=mysql_query('SELECT cliente_email FROM clientes WHERE cliente_email="'.$email.'" and cliente_id!='.$_SESSION['user_id']) or die(mysql_error());
		$count=@mysql_num_rows($query);

		if ($result==1 && $count=="0")
			return 'true'; else return 'false';
	} 
	function validatePasswords($pass1, $pass2) {
		//se não for igual
		if(strpos($pass1, ' ') !== false)
			return false;
		//se for
		return $pass1 == $pass2 && strlen($pass1) > 4;
	}
	function validateName($name){
		//nao valido
		if(strlen($name) < 4)
			return false;
		//valido
		else
			return true;
	}
	function validateMorada($morada){
		//nao valida
		if(strlen($morada) < 6)
			return false;
		//valida
		else
			return true;
	}
	function validateCP($codp){
		//nao valida
		if(strlen($codp) < 4)
			return false;
		//valida
		else
			return true;
	}
	function validateNIF($nif){
		//nao valido
		if(strlen($nif) != 9)
		return false;
		//valida
		else
		return true;}
	function validateOldPass($pass){
		$old_pass=mysql_query("select cliente_password from clientes where cliente_id=".$_SESSION['user_id']) or die (mysql_error());
		if (mysql_affected_rows() > 0)
		{
		if ($pass == mysql_result($old_pass,0,"cliente_password"))
		return true;
		else
		return false;
		}
	}




	
		 if(isset($_POST['go_change']))
		 {
			 
    $id=$_POST['id'];
	$tele=$_POST['tel'];
	$nif=$_POST['nif'];
	$local=$_POST['localidade'];
	$rua=$_POST['morada'];
	$cp=$_POST['cp'];
	$email=$_POST['mail'];
	$nome=$_POST['nome'];
	$password=$_POST['nova_pw'];
	$password_c=$_POST['nova_pw_conf'];
	$pw=$_POST['old_pass'];
	if(isset($_POST['nova_pw']) && isset($_POST['nova_pw_conf']) && isset($_POST['old_pass']) && $_POST['nova_pw'] != "" && $_POST['nova_pw_conf'] != "" && $_POST['old_pass'] != "")
	{
	$old_pass=validateOldPass($pw);
	$password_val=validatePasswords($password, $password_c);
	}
	
	$morada_val=validateMorada($rua);
	$cp_val=validateCP($cp);
	$email_val=validateEmail($email);
	$nome_val=validateName($nome);
	
	
		if($email_val!="true" || $nome_val!="true" || $morada_val!="true" || $cp_val!="true")
		{
			
			if ($email_val!='true')
				{
					header("location:form_alterar_utilizador.php?id=$id&erro=mail");
						exit();
				}
		elseif($nome_val !='true')
				{
					header("location:form_alterar_utilizador.php?id=$id&erro=nome");
						exit();
				}
		elseif($morada_val!='true')
				{header("location:form_alterar_utilizador.php?id=$id&erro=address");
						exit();}
		elseif($cp_val!='true')
                {header("location:form_alterar_utilizador.php?id=$id&erro=cp");
						exit();}
			
			
			
		}
		else{
			
			$pass_control=false;
		
			if($pw != "" || $password != "" || $password_c != "")
		 {
			
			
			
			if($pw == "")
			{
			header("location:form_alterar_utilizador.php?id=$id&alt_pass=not");
				exit();
		 }
		 elseif ($password == "")
		 {
			 header("location:form_alterar_utilizador.php?id=$id&alt_pass=not");
				exit();
		 }
		 elseif ($password_c == "")
		 {
			 header("location:form_alterar_utilizador.php?id=$id&alt_pass=not");
				exit();
		 }
		elseif ($old_pass!='true')
				{
					header("location:form_alterar_utilizador.php?id=$id&erro=passold");
						exit();
				}
		elseif($password_val !='true')
		{
				header("location:form_alterar_utilizador.php?id=$id&erro=passmatch");
						exit();		
		}
			
			
			
			 
			 $sql=mysql_query("update clientes set cliente_password='$password' where cliente_id=$id") or die (mysql_error());
			 $pass_control=true;
			 }
		 
	
	$sql=mysql_query("update clientes 
 					 
					 
					 
					 set cliente_nome='$nome',
					 cliente_morada='$rua',
					 cliente_telefone='$tele',
					 cliente_email='$email',
					 cliente_nif='$nif',
					 cliente_cp='$cp',
					 cliente_localidade='$local' 
					 where cliente_id=".$id) or die (mysql_error());
	
	
					
					
			 
			 if($pass_control=='true')
			 {
			 header("location:form_alterar_utilizador.php?id=$id&alt_pass=done");
			 exit();
			 }
			 else
			 	{
					header("location:form_alterar_utilizador.php?id=$id&alt=done");
			 		exit();
				}
			 
		}
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
		 }else
		 	{header("location:form_alterar_utilizador.php?id=".$id."&form_sub=not");
			exit();}
	
	 }
    
	else
	 	header("location:index.php?erro=6");
		
	?>
					 
					
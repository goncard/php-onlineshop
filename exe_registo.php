<?php
	include("includes/body.php");
	
	
	
		
		
	if (isset($_POST['registo']))
	{
	$email=$_POST['mail'];
	$local=$_POST['localidade'];
	$nome=$_POST['nome'];
	$password=$_POST['pass'];
	$rua=$_POST['morada'];
	$cp=$_POST['cp'];
	$morada_val=validateMorada($rua);
	$cp_val=validateCP($cp);
	$email_val=validateEmail($email);
	$password_val=validatePasswords($password, $_POST['conf_password']);
	$nome_val=validateName($nome);
		
	
	if($email_val != "true")
	{
		header("location:form_registo.php?reg_erro=mail");
		exit();
	}
	elseif($password_val != "true")
	{
		header("location:form_registo.php?reg_erro=pass");
		exit();
	}
	elseif($nome_val != "true" )
	{
		header("location:form_registo.php?reg_erro=nome");
		exit();
	}
	elseif($morada_val != "true")
	 {
		 header("location:form_registo.php?reg_erro=address");
		 exit();
	 }
	 elseif($cp_val != "true")
	 {
		 header("location:form_registo.php?reg_erro=cp");
		 exit();
	 }
	
	
	if ($email_val=='true' && $password_val=='true' && $nome_val=='true' && $morada_val=='true' && $cp_val=='true'){
		 
		 $val = "";
    	 $possivel = "0123456789abcdefghijklmnopqrstuvwxyz"; 
   		 $i = 0;     
        while ($i < 20) { 
            $char = substr($possivel, mt_rand(0, strlen($possivel)-1), 1);        
            $val .= $char;
            $i++;
		}
		

	$sql=mysql_query("insert into clientes(				
							   cliente_nome,
							   cliente_morada,
							   cliente_telefone,
							   cliente_email,
							   cliente_password,
							   cliente_nif,
							   cliente_cp,
							   cliente_validacao,
							   cliente_estado,
							   cliente_localidade)
			values(
				   '$nome',
				   '$_POST[morada]',
				   '$_POST[tel]',
				   '$_POST[mail]',
				   '$password',
				   '$_POST[nif]',
				   '$_POST[cp]',
				   '$val',
				   'pendente',
				   '$local')") or die (mysql_error());
	
	
	$assunto="Apocalyptic - Activação da sua conta";
	$headers .= 'From: Apocalyptic [goncalo_card@hotmail.com]';
	$headers .= 'Reply-To: Apocalyptic [goncalo_card@hotmail.com]';
	$msg = "";
	$msg .= "Bem-vindo(a) ".utf8_encode($_POST['nome'])."<br>";
	$msg .= " Active a sua conta clicando na seguinte hiperligação: ";
	$msg .= "<a href='http://psinf.espr.edu.pt/goncalo/activar_utilizador.php?val=".$val."'>";
	mail($email,$assunto,$msg,$headers);
	
	header("location:index.php?registo=done");
	}
	else
		header("location:form_registo.php?registo=not");
	}
?>
				   
				   
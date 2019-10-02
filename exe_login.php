<?php
	include("includes/body.php");
	if (!isset($_SESSION['user_id']))
		session_start();
		
	
		if ((isset($_POST['mail'])) && (isset($_POST['pass'])) && (isset($_POST['login_go'])))
		{
			
			$mail=$_POST['mail'];
			$pass=$_POST['pass'];
			
	
			if($mail == 'admin' && $pass == 'adminpass')
				{
					
					
					$_SESSION['user_id'] = 'admin';
					header("location:index.php");
					exit();
				}
				else
				{
					
					
				
			$procura=mysql_query("Select * from clientes where cliente_email='".$mail."' and cliente_password='".$pass."'");
			$num=mysql_affected_rows();
			
			if($num > 0)
				{
					if(mysql_result($procura,0,"cliente_estado") == 'activo')
					{

					
					
					$_SESSION['user_id']=mysql_result($procura,0,"cliente_id");
					header("location:index.php");
					exit();
				}	else
						{
							header("location:index.php?erro=7");
							exit();
						}
				}	
					else{
						header("location:index.php?erro=1");
						exit();}
								
				}
		
				
		}
		else
			header("location:index.php?erro=2");
		
		
			?>
					
<?php 
	if(!isset($_SESSION['user_id'])){
			session_start();}

	include("includes/body.php");
	
	if(isset($_POST['altera_b']) && isset($_POST['nome']) && $_POST['nome'] != "")
{
	
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
	 {
		 $nome=$_POST['nome'];
		 $id=$_POST['id'];
	$sql=mysql_query("update bandas set banda_nome='".$nome."' where banda_id=".$id) or die (mysql_error());
     header("location:gerir_bandas.php?p=1&alt_b=done");
	exit();
	 }
	 else{
	 	header("location:index.php?erro=5");
		exit();}
}
		else
		header("location:gerir_bandas.php?p=1&alt_b=not");
	 
	?>
					 
					 
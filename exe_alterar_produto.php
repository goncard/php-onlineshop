<?php 
if(!isset($_SESSION['user_id']))
			session_start();

include("includes/body.php");
	
	
	if(isset($_POST['altera_p']) && isset($_POST['nome']) && $_POST['nome'] != "" && isset($_POST['preco']) && $_POST['preco'] != "" && isset($_POST['banda']) && $_POST['banda'] != "" )
{
	
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 'admin')
	 {
		  
		 
	$nome=$_POST['nome'];
	$preco=$_POST['preco'];
	$descricao=$_POST['descricao'];
	$novidade=$_POST['novidade'];
	$promo=$_POST['promocao'];
	$banda=$_POST['banda'];
	$id=$_POST['id'];
	
	
$p_banda=mysql_query("select banda_id from bandas where banda_nome='".$banda."'") or die (mysql_error());
if (mysql_affected_rows() > 0 ){
	$id_banda=mysql_result($p_banda,0,"banda_id");
}
	
$p_foto=mysql_query("select produto_foto from produtos where produto_id=".$_POST['id']) or die (mysql_error());
	if(mysql_affected_rows() > 0){
		$novonome=mysql_result($p_foto,0,"produto_foto");
		$foto=$novonome;
	}
		
		
	if ($_FILES["foto"]["name"])
	{
		
		
		
		
		
		
		
		$nome_foto=$_FILES['foto']['name'];
 $ext_validas=array("JPG","JPEG","PNG","PJPEG");
 $ext_foto=explode(".",$nome_foto);
 if (in_array(strtoupper(end($ext_foto)), $ext_validas)) {
	 			if ($_FILES['foto']['size'] < 100000)
				{
					
 
		 $extensao= end(explode(".", $nome_foto)); 
		 if ((strtoupper($extensao) == "JPG") || (strtoupper($extensao) == "JPEG") || (strtoupper($extensao) == "PJPEG"))
		 {
		 
		 				$novonome = time().".".$extensao;
		 $imagemjpg = $_FILES['foto']['tmp_name'];
		 $largura_alvo =100;
		 $largura_alvo_n = 200;

		 $img = imagecreatefromjpeg($imagemjpg);
		 
		 $largura_original = imagesx($img);
		 $altura_original = imagesy($img);
		 
		 $altura_nova = (int) ($altura_original * $largura_alvo)/$largura_original;
		 $altura_nova_n = (int) ($altura_original * $largura_alvo_n)/$largura_original;

		 
		 $nova = imagecreatetruecolor($largura_alvo,$altura_nova);
		 $nova_n = imagecreatetruecolor($largura_alvo_n,$altura_nova_n);


		 imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura_alvo, $altura_nova, $largura_original,  $altura_original);
		 imagecopyresampled($nova_n, $img, 0, 0, 0, 0, $largura_alvo_n, $altura_nova_n, $largura_original,  $altura_original);


		 imagejpeg($nova,"imagens/produtos/mini/".$novonome);
		 imagejpeg($nova_n,"imagens/produtos/n_".$novonome);
		 unlink("imagens/produtos/n_".$foto);
		 unlink("imagens/produtos/mini/".$foto);




		 
		 }
		 elseif (strtoupper($extensao) == "PNG")
		 	{
				$novonome = time().".".$extensao;
		 $imagemjpg = $_FILES['foto']['tmp_name'];
		 $largura_alvo = 100;
		 $largura_alvo_n = 200;

		 $img = imagecreatefrompng($imagemjpg);
		 
		 $largura_original = imagesx($img);
		 $altura_original = imagesy($img);
		 
		 $altura_nova = (int) ($altura_original * $largura_alvo)/$largura_original;
		 $altura_nova_n = (int) ($altura_original * $largura_alvo_n)/$largura_original;

		 
		 $nova = imagecreatetruecolor($largura_alvo,$alura_nova);
		 $nova_n = imagecreatetruecolor($largura_alvo_n,$altura_nova_n);


		 imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura_alvo, $altura_nova, $largura_original,  $altura_original);
		 imagecopyresampled($nova_n, $img, 0, 0, 0, 0, $largura_alvo_n, $altura_nova_n, $largura_original,  $altura_original);


		 imagepng($nova,"imagens/produtos/mini/".$novonome);
		 imagepng($nova_n,"imagens/produtos/n_".$novonome);
		 unlink("imagens/produtos/n_".$foto);
		  unlink("imagens/produtos/mini/".$foto);



		 
			}
		
		  
											 }
											 else
											 	{header("location:gerir_produtos.php?p=1&erro=size");
													exit();}
 												}
													else{
												 	header("location:gerir_produtos.php?p=1&erro=ext");
													exit();}
		
		
		
		
		
		
		

	}
 
		$sql=mysql_query("update produtos set produto_nome='".$nome."', produto_preco='".$preco."', produto_foto='".$novonome."', produto_descricao='".$descricao."',  produto_novidade='".$novidade."', produto_promo='".$promo."', produto_banda_id=".$id_banda." where produto_id=".$id) or die (mysql_error());			
					 header("location:gerir_produtos.php?p=1&alt_p=done");
					 exit();
	
	 }
	 else{
	 	header("location:index.php?erro=5");
		exit();	 }
}
else
	header("location:gerir_produtos.php?p=1&form=not");
	
	?>
					 
					 
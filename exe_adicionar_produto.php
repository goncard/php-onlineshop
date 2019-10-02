<?php

if(!isset($_SESSION['user_id']))
			session_start();
include("includes/body.php");

if(isset($_POST['adiciona_p']) && isset($_POST['nome']) && $_POST['nome'] != "" && isset($_POST['preco']) && $_POST['preco'] != "" && isset($_POST['banda']) && $_POST['banda'] != "" && $_FILES['foto']['name'])
{
	

  
  
 if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] == 'admin'))
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
		 $largura_alvo = 100;
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

		 
		 $nova = imagecreatetruecolor($largura_alvo,$altura_nova);
		 $nova_n = imagecreatetruecolor($largura_alvo_n,$altura_nova_n);


		 imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura_alvo, $altura_nova, $largura_original,  $altura_original);
		 imagecopyresampled($nova_n, $img, 0, 0, 0, 0, $largura_alvo_n, $altura_nova_n, $largura_original,  $altura_original);


		 imagepng($nova,"imagens/produtos/mini/".$novonome);
		 imagepng($nova_n,"imagens/produtos/n_".$novonome);


		 
			}
		
		  
											 }
											 else
											 	{header("location:gerir_produtos.php?p=1&erro=size");
													exit();}
 												}
													else{
												 	header("location:gerir_produtos.php?p=1&erro=ext");
													exit();}


$nome=$_POST['nome'];
$preco=$_POST['preco'];
if ($_POST['descricao'] != "")
{$descricao=$_POST['descricao'];}
$novidade=$_POST['novidade'];
$promo=$_POST['promocao'];
$id_banda=$_POST['banda'];








$sql=mysql_query("insert into
				 


produtos(produto_nome,produto_preco,produto_foto,produto_descricao,produto_novidade,produto_promo,produto_banda_id) 
				 
				 values('".$nome."','".$preco."','".$novonome."','".$descricao."','".$novidade."','".$promo."','".$id_banda."')") or die (mysql_error());

 
	header("location:gerir_produtos.php?p=1&add_p=done");
	exit();
	}
	 else{
	 	header("location:index.php?erro=5");
		exit();
	 }
}else
	header("location:gerir_produtos.php?p=1&form=not");
	?>
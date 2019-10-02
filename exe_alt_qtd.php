<?php 
		if(!isset($_SESSION['user_id']))
			session_start();

include("includes/body.php"); 

		if(isset($_POST['ch_qtd']) && isset($_POST['qtd']) && $_POST['qtd'] != "")
		 {
			 $check=mysql_query("select * from encomenda_produtos where encomenda_produtos_encomenda_id=".$_POST['e_id']." and encomenda_produtos_produto_id=".$_POST['p_id']." and encomenda_produtos_tamanho_id=".$_POST['t_id']) or die (mysql_error());
			 if(mysql_affected_rows() > 0 ){
				  $v_qtd=mysql_result($check,0,"encomenda_produtos_produto_quantidade");
			 	if ($_POST['qtd'] == $v_qtd){ header("location:carrinho_compras.php?p=1&erro=qtd");
				exit();}
			 }
			 
			 $preco=mysql_query("select * from produtos where produto_id=".$_POST['p_id']) or die (mysql_error());
			 $preco_total=(mysql_result($preco,0,"produto_preco") * $_POST['qtd']);
			 
			
		$update=mysql_query("update encomenda_produtos inner join encomendas on encomenda_produtos_encomenda_id=encomenda_id set encomenda_produtos_produto_quantidade=".$_POST['qtd'].",encomenda_produtos_produto_total=".$preco_total." where encomenda_produtos_produto_id=".$_POST['p_id']." and encomenda_produtos_tamanho_id=".$_POST['t_id']." and encomenda_produtos_encomenda_id=".$_POST['e_id']) or die (mysql_error());
		header("location:carrinho_compras.php?p=1&qtd=done");
		exit();
		 }
		 else
			 header("location:carrinho_compras.php?p=1&qtd=not");?>
			 
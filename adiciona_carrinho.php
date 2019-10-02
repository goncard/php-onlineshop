<?php

if(!isset($_SESSION['user_id']))
			session_start();
		

include("includes/body.php");

	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != "admin")
		{ 

			if(isset($_POST['carrinho_go']) && isset($_POST['tamanho']) && $_POST['tamanho'] != "none" && isset($_POST['qtd']) && $_POST['qtd'] != "none")
				{
					$verifica_encomenda=mysql_query("select * from encomendas where encomenda_cliente_id=".$_SESSION['user_id']." and encomenda_estado='por finalizar'") or die (mysql_error()); 
					if (mysql_affected_rows() > 0)
					{						$encomenda_id=mysql_result($verifica_encomenda,0,"encomenda_id");}
					else
					{

					$data=date("Y-m-d");
					$id=$_SESSION['user_id'];
					$encomenda=mysql_query("insert into encomendas (encomenda_data,encomenda_estado,encomenda_cliente_id) 
																		   
											  					values('$data','por finalizar',$id)");
					$encomend=mysql_query("select * from encomendas where encomenda_cliente_id=$id and encomenda_estado='por finalizar'");
					$encomenda_id=mysql_result($encomend,0,"encomenda_id");
					
					}
				
						
					$produto_id=$_POST['id'];
					$qtde=$_POST['qtd'];
					$tamanho=$_POST['tamanho'];
					
					$preco=mysql_query("select * from produtos where produto_id=$produto_id") or die (mysql_error());
					$sql=mysql_query("select * from encomenda_produtos where encomenda_produtos_produto_id=$produto_id and encomenda_produtos_tamanho_id=$tamanho and encomenda_produtos_encomenda_id=$encomenda_id");

					if (mysql_affected_rows() > 0)
					{
					$produto_total=(mysql_result($sql,0,"encomenda_produtos_produto_total") + (mysql_result($preco,0,"produto_preco")) * $qtde);
					$qtd=mysql_result($sql,0,"encomenda_produtos_produto_quantidade")+$qtde;
					$update=mysql_query("update encomenda_produtos set encomenda_produtos_produto_quantidade=$qtd, encomenda_produtos_produto_total=$produto_total where encomenda_produtos_produto_id=$produto_id and encomenda_produtos_encomenda_id=$encomenda_id and encomenda_produtos_tamanho_id=$tamanho");
					header("location:index.php?add_cart=done");
					exit();
					}
					else
					{
					$p=mysql_result($preco,0,"produto_preco");
					$p_val=$p * $qtde;
					$produto_encomenda=mysql_query("insert into encomenda_produtos
												   									(encomenda_produtos_produto_id,encomenda_produtos_encomenda_id,encomenda_produtos_produto_quantidade,encomenda_produtos_tamanho_id,encomenda_produtos_produto_total)
																					
																					values($produto_id,$encomenda_id,$qtde,$tamanho,$p_val)") or die (mysql_error());
					header("location:index.php?add_cart=done");
					exit();
				}
				}
				else
					{
					header("location:index.php?form_cart=not");
					exit();
					}
					
		}
		else
		{
			header("location:index.php?erro=8");
			exit();
		}
		
		?>
		
				
				
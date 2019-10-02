<?php
		include("includes/body.php");
		if(isset($_GET['val']) && $_GET['val'] != "")
			{
				$verifica=mysql_query("select cliente_estado from clientes where cliente_validacao='".$_GET['val']."'") or die (mysql_error());
				if ((mysql_affected_rows() >0) && (mysql_result($verifica,0,"cliente_estado") == 'activo'))
					{header("location:index.php?validacao=alreadydone");
					exit();}
				$activar=mysql_query("update clientes set cliente_estado='activo' where cliente_validacao='".$_GET['val']."'") or die (mysql_error());
				header("location:index.php?validacao=done");
				exit();
			}
			else
				header("location:index.php?erro=4");
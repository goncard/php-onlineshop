




<?php
	include("config.php");
		$liga=mysqli_connect(C_HOST,C_USER,C_PASS);
		if(!$liga)
  		{
  			die("Problemas ao ligar à base de dados: " . mysql_error());
  		}
		mysqli_select_db($liga,C_BD);
		


	function top()
	{
		?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Apocalyptic - Merchandise</title>
<link href="folhaestilo.css" rel="stylesheet" type="text/css" />
<link href="includes/simplePopup.css" rel="stylesheet" type="text/css" />
<script src="includes/jquery.js"></script>
<script src="includes/jquery.maskedinput.js"></script>
<script src="includes/jquery.validate.js"></script>
<script type="text/javascript">


function con(id)
{
	var c;
	if(id == 'produto')
	{
		c = confirm('Tem a certeza que pretende eliminar este produto?');
		if (c != 0)
		return true;
		else
		return false;
	}
	else
	if(id == 'encomenda')
	{
		c = confirm('Tem a certeza que pretende eliminar esta encomenda?');
		if (c != 0)
		return true;
		else
		return false;
	}
	else
	if(id == 'tamanho')
	{
		c = confirm('Tem a certeza que pretende eliminar este tamanho?');
		if (c != 0)
		return true;
		else
		return false;
	}
	else
	if(id == 'banda')
	{
		c = confirm('Tem a certeza que pretende eliminar esta banda?');
		if (c != 0)
		return true;
		else
		return false;
	}
	else
	if(id == 'cliente')
	{
		c = confirm('Tem a certeza que pretende eliminar este cliente?');
		if (c != 0)
		return true;
		else
		return false;
	}	
}






  $(document).ready(function() {
  





	

	
	


// validate signup form on keyup and submit
	var validator = $("#reg_user_form").validate({
		rules: {
			nome: {
				required: true,
				minlength: 3
			},

			morada: {
				required: true,
				minlength: 5
			},
			pass: {
				required: true,
				minlength: 5
			},
			conf_password: {
				required: true,
				minlength: 5,
				equalTo: "#pass"
			},
			mail: {
				required: true,
				email: true,
				remote: "verifica_mail.php"
			},
			cp: {
				required: true,
				minlength: 4
			},
			nif: {
				required: false,
				minlength: 9
			},
			tel: {
				required: false,
				minlength: 9
			},
			
		},
		messages: {
			nome: "Introduza o seu nome completo",
			password: {
				required: "Digite a sua password",
				rangelength: jQuery.format("Pelo menos {0} caracteres")
			},
			password_confirm: {
				required: "Repita a sua password",
				minlength: jQuery.format("Pelo menos {0} caracteres"),
				equalTo: "Insira a mesma password que colocou em cima"
			},
			mail: {
				required: "Por favor, insira um E-mail v&aacute;lido",
                mail: "Por favor, insira um E-mail v&aacute;lido",
				minlength: "Por favor, insira um E-mail v&aacute;lido",
				remote: jQuery.format("{0} J· est· a ser utilizado")
			},
			morada:"Introduza uma morada válida",
			cp: {
				required: "Introduza o seu código postal",
				minlength: jQuery.format("Pelo menos {0} caracteres")
			},
			tel: {
				required: "Introduza o seu número de telefone/telemóvel",
				minlength: jQuery.format("Pelo menos {0} caracteres")
			},
			nif: {
				required: "Introduza o seu NIF (número de identificação fiscal)",
				minlength: jQuery.format("Pelo menos {0} caracteres")
			},
		}
			
		});
	
						  

jQuery(function($){
   $("#tel").mask("(99)9999999");
   $("#nif").mask("999999999");
});
});
</script>  


</head>
<body alink="#FFFFFF" link="#FFFFFF" vlink="#FFFFFF" >
<?php	if(!isset($_SESSION['user_id']))
			session_start();
			
	
		?>
<div id="geral">
  <div id="head" align="center"><a href="index.php"><img src="imagens/header.png" border="0" /></a></div>
  <div>&nbsp;</div>
  
 <?php
 
	}
	




	function menu()
	{
		?>
        <div id="menu">
  <div>&nbsp;</div>
    <div align="center" id="menubor"><b><a href="index.php">Início</a></b></div>
    <div>&nbsp;</div>
    <div align="center" id="menubor"><b><a href="produtos.php?p=1">Produtos</a></b></div>
    <div>&nbsp;</div>
    <div align="center" id="menubor"><b><a href="tamanhos.php">Tamanhos</a></b></div>
    <div>&nbsp;</div>
    <div align="center" id="menubor"><b><a href="contactos.php">Contactos</a></b></div>
    <div>&nbsp;</div>
    <div align="center" id="menubor"><b><a href="ajuda.php">Ajuda</a></b></div>
  </div>
  <?php
	}
	
	function login()
	{
		?>
		<div id="login">
  	<div>&nbsp;</div>
    <div align="center">E-mail:</div>
    <form method="post" action="exe_login.php"><div align="center">
    
      <input type="text" name="mail" class="textbox" />
     </div>
    <br />
    <div align="center">Palavra-passe: </div>
    <div align="center">
      <input type="password" name="pass" class="textbox" />
    </div>
    <br />
    <div align="center">
      <input type="submit" name="login_go" value="Iniciar sessão" />
    </div></form>
    <br />
    <div align="center">
     <a href="form_registo.php" title="Clique aqui para se registar no site" >Registar</a><br />
<a href="form_recuperar_pw.php">Recuperar palavra-passe</a>
    </div>
    <div>&nbsp;</div>
	
                
  </div>
  
  <?php }
  
  
  function c_compras()
  {
	  $control=false;
	   $nume=mysql_query("select sum(encomenda_produtos_produto_quantidade) as 'num' from encomenda_produtos inner join encomendas on encomenda_produtos_encomenda_id=encomenda_id where encomenda_cliente_id=".$_SESSION['user_id']." and encomenda_estado='por finalizar'") or die (mysql_error()); 
	  $carrinho=mysql_query("select * from encomenda_produtos inner join encomendas on encomenda_produtos_encomenda_id=encomenda_id  inner join clientes on encomenda_cliente_id=cliente_id where cliente_id=".$_SESSION['user_id']."  and encomenda_estado='por finalizar'") or die (mysql_error());
	 $num=mysql_affected_rows();
	  if($num > 0)
	  {
	  $control=true;
	  $encomenda_id=mysql_result($carrinho,0,"encomenda_id");
	  $total=mysql_query("select sum(encomenda_produtos_produto_total) as 'total' from encomenda_produtos inner join encomendas on encomenda_produtos_encomenda_id=encomenda_id where encomenda_id=$encomenda_id and encomenda_estado='por finalizar'") or die (mysql_error());}
	  ?> 
	<div class="cart">
  	<table style="position:absolute; left:10px;"><tr><td>&nbsp;</td></tr>
    <tr><td align="center">Nº de produtos:  <b><?php echo mysql_result($nume,0,"num");?></b></td></tr>
    <tr><td align="center">Total:   <b><?php if ($control==true){echo (mysql_result($total,0,"total"));} else{ echo 0;}?> €</b></td></tr>
    <tr><td colspan="2" align="center"><input type="button" value="Carrinho de compras" onclick="document.location.href='carrinho_compras.php?p=1';"/>
    </td></tr>
    </table>
  </div>
  
  <?php } 
  
  
 function logged()
 { if(isset($_SESSION['user_id']))
 {
	 ?> 
 	<div id="logged">
     <div style="position:absolute;<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == "admin") echo "left:76px;"; else echo "left:30px;";?> top:15px;"><?php if( isset($_SESSION['user_id']) && $_SESSION['user_id'] != "admin") {?><input style="font-family:Calibri;width:100px;" type="button" onclick="window.location.href='form_alterar_utilizador.php?id=<?php echo $_SESSION['user_id'];?>';" value="Meus dados" /><?php } ?>&nbsp;&nbsp;<input type="button" style="width:100px; font-family:Calibri;" onclick="window.location.href='exe_logout.php';" value="Terminar sessão" /></div>
     </div>
     <?php }
 }
 
 
 
 function pesquisa()
 {
	 ?>
	 <div id="pesquisa"><div style="position:absolute; left: 30px; top: 12px;">
   <form action="pesquisa_res.php?p=1" method="post">
    <input class="object" type="text" value="Nome do produto" name="produto_nome" />
    <select class="object" name="banda_nome">
        <option value="" >Banda</option>
        <?php $res=mysql_query("select * from bandas order by banda_nome asc");
				$num=mysql_affected_rows();
				for($i=0;$i<$num;$i++)
				{
					?><option><?php echo mysql_result($res,$i,"banda_nome");?></option>
                    
                    <?php } ?>
      </select>
     
     <input class="object" type="submit" name="form_pesquisa" title="Clique aqui para processar a pesquisa" value="Pesquisar" />
      
  </form>
  </div>
</div>
 
 <?php } 
 
 function menu_admin(){
	 ?>
     
     
     
     <div id="menu_admin">
  <div>&nbsp;</div>
    <div align="center"><a href="gerir_produtos.php?p=1">Gerir produtos</a></div>
    <div>&nbsp;</div>
    <div align="center"><a href="gerir_encomendas.php?p=1">Gerir encomendas</a></div>
    <div>&nbsp;</div>
    <div align="center"><a href="gerir_utilizadores.php?p=1">Gerir utilizadores</a></div>
    <div>&nbsp;</div>
    <div align="center"><a href="gerir_tamanhos.php?p=1">Gerir tamanhos</a></div>
    <div>&nbsp;</div>
    <div align="center"><a href="gerir_bandas.php?p=1">Gerir bandas</a></div>
  </div>
    
     
     <?php }
 
 function index_user(){
	 ?>
	 <div id="quem" align="right"> 
     <div>&nbsp;</div>
          <div>&nbsp;</div>
<div>&nbsp;</div>
    <p>Quem somos?
      
      A Apocalyptic é uma loja online de produtos de merchandise oficial de música.<br /><br />
      
      Pretendemos disponibilizar uma boa selecção de t-shirts oficiais para os fãs das várias bandas.</p>
    <p>De forma rápida e prática todos os clientes têm a possibilidade de seleccionar as t-shirts e fazer uma encomenda. </p>
  </div>
     <div id="novidades">
     	<table width="404" cellpadding="3" height="171" align="left" >
       <tr>
        <td align="center" colspan="2"><img src="imagens/top.jpg" align="center"  /></td></tr>
        <tr><td>&nbsp;</td></tr>
	<?php 
	$i=1;
	$res=mysql_query("select * from produtos where produto_novidade='sim' order by rand() limit 4");
	if (mysql_affected_rows() >0)
	{
	while($row=mysql_fetch_array($res)){ 
	
	
    
			if ($i <= 2)
			{
				?>
                <td align="center"><form method="post" action="adiciona_carrinho.php" > 
     	<div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><img src="imagens/produtos/mini/<?php echo $row['produto_foto'];?>"/></a></div>
        
        <input type="hidden" name="id" value="<?php echo $row['produto_id'];?>" />
       <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><?php echo $row['produto_nome'];?></a></div>
       <div><b><font face="Calibri" style="font-size:15px;"> <?php echo $row['produto_preco'];?> €</b></font></div>
       <div><select name="tamanho" class="botaotbl" >
        <option value="none">Tamanho</option>
        <?php 
        $sql=mysql_query("select * from tamanhos");
		$num=mysql_affected_rows();
		for ($conta=0;$conta<$num;$conta++)
		{
		?><option value="<?php echo mysql_result($sql,$conta,"tamanho_id");?>"><?php echo mysql_result($sql,$conta,"tamanho_nome");?></option>
  <?php } ?>
        </select>
        <select name="qtd" style="width:100px; font-family:Calibri;">
        <option value="none">Quantidade</option>
        <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option>

		</select>



        <input class="botaotbl" type="submit" value="Comprar" name="carrinho_go" /> </form></div>
        
        </td>
    <?php } 
			else{
				?>
     			</tr><tr><td align="center"><form method="post" action="adiciona_carrinho.php" > 
                <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><img src="imagens/produtos/mini/<?php echo $row['produto_foto'];?>"/></a></div>
                
                <input type="hidden" name="id" value="<?php echo $row['produto_id'];?>" />

       <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><?php echo $row['produto_nome'];?></a></div>
    		       <div><b><font face="Calibri" style="font-size:15px;"> <?php echo $row['produto_preco'];?> €</font></b></div>
    
        
        <div><select name="tamanho" style="font-family:Calibri; width:90px; ">
        <option value="none">Tamanho</option>
        <?php 
        $sql=mysql_query("select * from tamanhos");
		$num=mysql_affected_rows();
		for ($conta=0;$conta<$num;$conta++)
		{
		?><option><?php echo mysql_result($sql,$conta,"tamanho_nome");?></option>
  <?php } ?>
        </select>
        <select name="qtd" style="width:100px; font-family:Calibri;">
        <option value="none">Quantidade</option>
        <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option>

		</select>



        <input type="submit" class="botaotbl" value="Comprar" name="carrinho_go" /></form></div>
        
        </td>
        
        
        
    <?php  
			$i=1;}
			$i++;
			?><?php
			
	}
	}else
		echo "<tr><td align='center'>Sem produtos</td>";
	?>
	</tr></table>
  </div> 

  
     <div id="promo">
    <table width="404" cellpadding="3" height="171" align="left" >
    <tr>
        <td align="center" colspan="2"><img src="imagens/promo.jpg"align="center"  /></td></tr>
        <tr><td>&nbsp;</td></tr>
	<?php 
	$i=1;
	$res=mysql_query("select * from produtos where produto_promo='sim' order by rand() limit 4");
	if (mysql_affected_rows() >0)
	{
	while($row=mysql_fetch_array($res)){ 
	
	
    
			if ($i <= 2)
			{
				?>
                <td align="center"> <form method="post" action="adiciona_carrinho.php">
     	<div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><img src="imagens/produtos/mini/<?php echo $row['produto_foto'];?>"  /></a></div>
                <input type="hidden" name="id" value="<?php echo $row['produto_id'];?>" />

        
       <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><?php echo $row['produto_nome'];?></a></div>
         <div><b><font face="Calibri" style="font-size:15px;"> <?php echo $row['produto_preco'];?> €</b></font></div>
       <div><select name="tamanho" style="font-family:Calibri; width:80px; ">
        <option value="none">Tamanho</option>
        <?php 
        $sql=mysql_query("select * from tamanhos");
		$num=mysql_affected_rows();
		for ($conta=0;$conta<$num;$conta++)
		{
		?><option value="<?php echo mysql_result($sql,$conta,"tamanho_id");?>"><?php echo mysql_result($sql,$conta,"tamanho_nome");?></option>
  <?php } ?>
        </select>
        <select name="qtd" style="width:100px; font-family:Calibri;">
        <option value="none">Quantidade</option>
        <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option>

		</select>



        <input class="botaotbl" type="submit" value="Comprar" name="carrinho_go" /></form></div>
        
        </td>
    <?php } 
			else{
				?>
     			</tr><tr><td align="center"><form method="post" action="adiciona_carrinho.php">
                <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><img src="imagens/produtos/mini/<?php echo $row['produto_foto'];?>"  /></a></div>
                <input type="hidden" name="id" value="<?php echo $row['produto_id'];?>" />
        
       <div><a href="ficha_produto.php?id=<?php echo $row['produto_id'];?>"><?php echo $row['produto_nome'];?></a></div>
    		       <div><b><font face="Calibri" style="font-size:15px;"> <?php echo $row['produto_preco'];?> €</font></b></div>
    
        
        <div><select name="tamanho" style="font-family:Calibri; width:80px; ">
        <option value="none">Tamanho</option>
        <?php 
        $sql=mysql_query("select * from tamanhos");
		$num=mysql_affected_rows();
		for ($conta=0;$conta<$num;$conta++)
		{
		?><option value="<?php echo mysql_result($sql,$conta,"tamanho_id");?>"><?php echo mysql_result($sql,$conta,"tamanho_nome");?></option>
  <?php } ?>
        </select>
        <select name="qtd" style="width:100px; font-family:Calibri;">
        <option value="none">Quantidade</option>
        <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option>

		</select>



        <input type="submit" class="botaotbl" value="Comprar" name="carrinho_go" /></form></div>
        
        </td>
        
        
        
    <?php  
			$i=1;}
			$i++;
			?><?php
			
	}
	}else
		echo "<tr><td align='center'>Sem produtos</td>";
	?>
	</tr></table>
  </div> 
  
  
  

		<?php	
				
 }
 function admin_title()
 {
	 ?>
     <div style="position:absolute;top:398px; left:450px;"><img src="imagens/admin.jpg" /></div>
     <?php } 
  
	



//VALIDACOES


function validateEmail($email){
		$result=preg_match("^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$^",$email);
		$query=mysql_query('SELECT cliente_email FROM clientes WHERE cliente_email="'.$email.'"') or die(mysql_error());
		$count=@mysql_num_rows($query);

		if ($result==1 && $count=="0")
			return 'true'; else return 'false';
	} 
function validateEmail2($email)
{
			$result=preg_match("^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$^",$email);
			if($result==1)
				return "true"; else return "false";
}
	function validatePasswords($pass1, $pass2) {
		//se não for igual
		if(strpos($pass1, ' ') !== false)
			return false;
		//se for
		elseif($pass1 == $pass2 && strlen($pass1) > 4)
		return true;
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
		if(strlen($morada) < 4)
			return false;
		//valida
		else
			return true;
	}
	function validateCP($codp){
		//nao valida
		if(strlen($codp) != 4)
			return false;
		//valida
		else
			return true;
	}
	
	
	
	
	



		
?>                                 









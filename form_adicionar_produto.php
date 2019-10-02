
<?php 


include("includes/body.php"); 
		top();
  

   		menu();
	pesquisa();
	
	    logged();

	
	
					
	
	if((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] == 'admin'))
	{ menu_admin();
	$banda=mysql_query("select * from bandas order by banda_nome");
	$num=mysql_affected_rows();?>
  <div style="left:442px; top:334px; position:absolute;"><form method="post" action="exe_adicionar_produto.php" enctype="multipart/form-data">
    <table  cellpadding="3" border="1" style="border-collapse:collapse; border-color:#333;">
     <tr>
     <td colspan="2" class="tableheaders" align="center">Novo produto</td></tr>
     	<tr>
        <td>Nome:*</td>
        <td><input type="text" name="nome" id="nome"  /></td>
     </tr>
     <tr>
     	<td>Preço:* </td>
        <td><input type="text" name="preco"  /></td>
     </tr>
     <tr>
     	<td>Banda:* </td>
        <td><select name="banda"><option>Seleccione a banda</option>
        <?php for ($i=0;$i<$num;$i++)
				{
					?><option value="<?php echo mysql_result($banda,$i,"banda_id");?>"><?php echo mysql_result($banda,$i,"banda_nome");?></option>
                    <?php } ?>
       </select> </td>
     </tr>
     <tr>
     	<td>Foto:* </td>
        <td><input type="file" name="foto" value="Seleccione a foto" ></td>
     </tr>
      <tr>
     	<td>Descrição: </td>
        <td><textarea name="descricao"></textarea></td>
     </tr>
     <tr>
     	<td>Novidade:</td>
        <td>Sim <input type="radio" name="novidade"  value="sim"   />&nbsp;Não <input type="radio" name="novidade"  value="nao" checked   /></td>
      </tr>
      <tr>
      	<td>Promoção:</td>
        <td>Sim <input type="radio" name="promocao"  value="sim"   />&nbsp;Não <input type="radio" name="promocao"  value="nao" checked   /></td>
      </tr>
      <tr>
     	<td></td> 
        <td><input name="adiciona_p" type="submit" value="Adicionar" /><input type="reset" value="Limpar" /></td>
     </tr>
     <tr><td class="t_end" colspan="2">* - Campos de preenchimento obrigatório</td></tr>
    </table>
  </form>
  </div>
<?php }else
			header("location:index.php?erro=5");
					?>

<div align="center" id="foot"><div id="txtfoot">
Copyright © 2010 Todos os direitos reservados. Gonçalo Cardeira.</div>
</div>
</div>
</body>
</html>

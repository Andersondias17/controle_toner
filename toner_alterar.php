<html>

    <form action="toner_alterar_post.php" method="POST">

        <label>Codigo</label>
        <input type="text" style="text-align: left" name="id_TON_CODIGO_ALT" value="<?php echo $_REQUEST['ton_codigo']; ?>" readonly>
        <br><br>
        <label>Nome</label>
        <input type="text" style="text-align: left" name="id_TON_DESCRI_ALT" value="<?php echo $_REQUEST['ton_descri']; ?>" > 
        <br><br>
        <label>Estoque Minimo</label>
        <input type="text" style="text-align: left" name="id_TON_ESTOQUE_MINIMO_ALT" value="<?php echo $_REQUEST['ton_estoque_minimo']; ?>">
        <br><br>

        <input type="submit" value="Salvar">
        <input type="button" value="Mudei de ideia" onclick="window.open('toner.php','_parent');"> 

    </form>

</html>
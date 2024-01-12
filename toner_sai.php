<html>

    <form action="toner_sai_post.php" method="POST"> <!--Tela de inclusão dos itens-->

        <label>Codigo</label>
        <input type="text" style="text-align: left" name="id_TON_CODIGO_NOVO" value="<?php echo $_REQUEST["ton_codigo"]; ?>">
        <br><br>
        <label>Data</label>
        <input type="date-local" style="text-align: left" name="id_TOS_DATA_NOVO" value="<?php echo date("Y-m-d H:i:s"); ?>">
        <br><br>
        <label>Qtdade</label>
        <input type="text" style="text-align: left" name="id_TOS_QTDADE_NOVO" value="">
        <br><br>
        <label>Observacao</label>
        <input type="text" style="text-align: left; text-transform: uppercase;" name="id_TOS_OBSERV_NOVO" value="">
        <br><br>
        
        <input type="submit" value="✔️"> <!--Botao para SALVAR, a alteração feita na pagina de incluir-->
        <input type="button" value="↩️" onclick="window.open('toner.php','_parent');"> <!-- Botao para voltar a pagina anterior-->

    </form>
        
</html>

<?php

    $json = file_get_contents("tabelas/tb_toner.json"); /* abre o arquivo */
    $tb_toner = json_decode($json); /* decodifica para o php*/

    /* cria a linha*/
    $linha = [ "TON_CODIGO" => $_POST["id_TON_CODIGO_NOVO"],
               "TON_DESCRI" => $_POST["id_TON_DESCRI_NOVO"],
               "TON_ESTOQUE_MINIMO" => $_POST["id_TON_ESTOQUE_MINIMO_NOVO"]
             ];


    array_push($tb_toner, $linha);  /*  adicionei a linha na tabela*/

    $json = json_encode($tb_toner); // Codifica 

    if (file_put_contents("tabelas/tb_toner.json", $json))  //salva a tabela
        echo "Salvo com sucesso...";
    else 
        echo "Oops! Erro...";

?>

<br>
<br>
<input type="button" value="Sucesso" onclick="window.open('toner.php','_parent');"> 
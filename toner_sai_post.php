<?php

    $QTD = $_POST["id_TOS_QTDADE_NOVO"];

    if ($QTD == ''){
        echo "Quantidade nao pode ser nulo";
        echo '<input type="button" value="Voltar" onClick="history.go(-1)">'; /* Faz voltar para a pagina anterior */
        
        exit;
    }

    if (file_exists("tabelas/tb_toner_sai.json")){
        $json = file_get_contents("tabelas/tb_toner_sai.json"); /* Abre o arquivo json */
        $tb_toner_sai = json_decode($json); /*decodifica o arquivo json */
    }else{
        $tb_toner_sai = [];
    }

    $linha = [ "TON_CODIGO" => $_POST["id_TON_CODIGO_NOVO"],
               "TOS_DATA" => $_POST["id_TOS_DATA_NOVO"],
               "TOS_QTDADE" => $_POST["id_TOS_QTDADE_NOVO"],
               "TOS_OBSERV" => strtoupper( $_POST["id_TOS_OBSERV_NOVO"])
             ];


    array_push($tb_toner_sai, $linha);  /*  adicionei a linha na tabela*/

    $json = json_encode($tb_toner_sai); // Codifica 

    if (file_put_contents("tabelas/tb_toner_sai.json", $json)) {
        include("toner.php");
    }
    else 
        echo "Oops! Erro...";
?>

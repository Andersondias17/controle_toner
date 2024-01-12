<?php

    $QTD = $_POST["id_TOE_QTDADE_NOVO"];

    if ($QTD == ''){
        echo "Quantidade nao pode ser nulo";
        echo '<input type="button" value="Voltar" onClick="history.go(-1)">'; /* Faz voltar para a pagina anterior */
        
        exit;
    }

    if (file_exists("tabelas/tb_toner_ent.json")){
        $json = file_get_contents("tabelas/tb_toner_ent.json"); /* Abre o arquivo json */
        $tb_toner_ent = json_decode($json); /*decodifica o arquivo json */
    }else{
        $tb_toner_ent = [];
    }

    $linha = [ "TON_CODIGO" => $_POST["id_TON_CODIGO_NOVO"],
               "TOE_DATA" => $_POST["id_TOE_DATA_NOVO"],
               "TOE_QTDADE" => $_POST["id_TOE_QTDADE_NOVO"],
               "TOE_OBSERV" => strtoupper( $_POST["id_TOE_OBSERV_NOVO"])
             ];


    array_push($tb_toner_ent, $linha);  /*  adicionei a linha na tabela*/

    $json = json_encode($tb_toner_ent); // Codifica 

    if (file_put_contents("tabelas/tb_toner_ent.json", $json))  {//salva o arquivo
        include("toner.php");
       
    }
    else 
        echo "Oops! Erro...";
?>


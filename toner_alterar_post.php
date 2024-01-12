<?php

$json = file_get_contents("tabelas/tb_toner.json"); /* Abre o arquivo json */
$tb_toner = json_decode($json); /*decodifica o arquivo json */

$tb_toner_novo = [];

for ($x = 0; $x <= count($tb_toner) - 1; $x++) { 

    if ( $tb_toner[$x]->TON_CODIGO == $_POST['id_TON_CODIGO_ALT'] ){

        $linha = [ "TON_CODIGO" => $_POST["id_TON_CODIGO_ALT"],
                   "TON_DESCRI" => $_POST["id_TON_DESCRI_ALT"],
                   "TON_ESTOQUE_MINIMO" => $_POST["id_TON_ESTOQUE_MINIMO_ALT"]
        ];

    }else{
        $linha = $tb_toner[$x];
    }

    array_push($tb_toner_novo, $linha );

}

$json = json_encode($tb_toner_novo); // Codifica 

if (file_put_contents("tabelas/tb_toner.json", $json))  //salva a tabela
    echo "Salvo com sucesso...";
else 
    echo "Oops! Erro...";
?>

<br>
<br>
<input type="button" value="Sucesso" onclick="window.open('toner.php','_parent');"> 
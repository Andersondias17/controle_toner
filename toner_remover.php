<?php

$json = file_get_contents("tabelas/tb_toner.json"); /* Abre o arquivo json */
$tb_toner = json_decode($json); /*decodifica o arquivo json */


$tb_toner_novo = [];

for ($x = 0; $x <= count($tb_toner) - 1; $x++) { 

    if ( $tb_toner[$x]->TON_CODIGO != $_REQUEST['ton_codigo'] ){
        array_push($tb_toner_novo, $tb_toner[$x] );
    }
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
<?php

    $json = file_get_contents("tabelas/tb_toner.json"); /* Abre o arquivo json */
    $tb_toner = json_decode($json); /*decodifica o arquivo json */

    if (file_exists("tabelas/tb_toner_ent.json")){
        $json = file_get_contents("tabelas/tb_toner_ent.json");
        $toner_ent = json_decode($json);
    }else{
        $toner_ent = [];
    }

    if (file_exists("tabelas/tb_toner_sai.json")){
        $json = file_get_contents("tabelas/tb_toner_sai.json");
        $toner_sai = json_decode($json);
    }else{
        $toner_sai = [];
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <style>
        table,td,th {
            border:1px solid blue; /* Linhas da Tabela */
            text-align: center; /* centralizar o conteudo dentro da tag*/
            font-family: Arial, Helvetica, sans-serif; /* tipo de fonte */
        };
        
    </style>
    
        <button onclick="window.open('toner_novo.php','_parent');">➕</button>

        <table style="width: 500px;">
            
            <!-- cabeçalho -->
            <tr>
                <th></th>
                <th></th>
                <th>Codigo</th>
                <th>Descrição</th>
                <th>Estoque Minimo</th>
                <th>Entrada</th>
                <th>Saida</th>
                <th>Estoque</th>
                <th></th>
            </tr>
        
<?php
//faça (inicie $x com zero; repita $x enquanto ele for menor ou igual ao resultado do count (qtd de registro) menos um; acrescente um a cada rodada)
for ($x = 0; $x <= count($tb_toner) - 1; $x++) { 

    
    echo '<tr>'.PHP_EOL;
    echo '  <td>'.PHP_EOL;
    echo '      <label title="Alterar" onclick="window.open(\'toner_alterar.php?ton_codigo='.$tb_toner[$x]->TON_CODIGO.'&ton_descri='.$tb_toner[$x]->TON_DESCRI.'&ton_estoque_minimo='.$tb_toner[$x]->TON_ESTOQUE_MINIMO.'\',\'_parent\');" readonly >✏️</label>'.PHP_EOL;      
    echo '  </td>'.PHP_EOL;
    echo '  <td>'.PHP_EOL;
    echo '      <label title="Remover" onclick="window.open(\'toner_remover.php?ton_codigo='.$tb_toner[$x]->TON_CODIGO.'\',\'_parent\');" readonly >❌</label>'.PHP_EOL;      
    echo '  </td>'.PHP_EOL;
    echo '  <td>'.PHP_EOL;
    echo '     <input type="text" style="text-align: left" name="id_TON_CODIGO_'.$x.'" value="'.$tb_toner[$x]->TON_CODIGO.'" readonly >'.PHP_EOL;
    echo '  </td>'.PHP_EOL;        
    echo '  <td>'.PHP_EOL;
    echo '     <input type="text" style="text-align: left" name="id_TON_DESCRI_'.$x.'" value="'.$tb_toner[$x]->TON_DESCRI.'" readonly >'.PHP_EOL;
    echo '  </td>'.PHP_EOL;
    echo '  <td>'.PHP_EOL;
    echo '     <input type="text" style="text-align: left" name="id_TON_ESTOQUE_MINIMO_'.$x.'" value="'.$tb_toner[$x]->TON_ESTOQUE_MINIMO.'" readonly >'.PHP_EOL;
    echo '  </td>'.PHP_EOL;

//entrada
    echo '  <td style="background-color: #0fd30f;cursor: pointer;" onclick="window.open(\'toner_ent.php?ton_codigo='.$tb_toner[$x]->TON_CODIGO.'\',\'_parent\');">'.PHP_EOL;
    $QTD_ENT = 0;

    for ($xE = 0; $xE <= count($toner_ent) - 1; $xE++) {

        if ( $tb_toner[$x]->TON_CODIGO == $toner_ent[$xE]->TON_CODIGO){

            $QTD_ENT = ($QTD_ENT + $toner_ent[$xE]->TOE_QTDADE);
        }

    }
    echo '     <label>'.$QTD_ENT.'</label>'.PHP_EOL;
    echo '  </td>'.PHP_EOL;

//saida
    echo '  <td style="background-color: #d3340f; cursor: pointer;" onclick="window.open(\'toner_sai.php?ton_codigo='.$tb_toner[$x]->TON_CODIGO.'\',\'_parent\');">'.PHP_EOL;
    $QTD_SAI = 0;

    for ($xS = 0; $xS <= count($toner_sai) - 1; $xS++) {

        if ( $tb_toner[$x]->TON_CODIGO == $toner_sai[$xS]->TON_CODIGO){

            $QTD_SAI = ($QTD_SAI + $toner_sai[$xS]->TOS_QTDADE);
        }
    }
    echo '     <label>'.$QTD_SAI.'</label>'.PHP_EOL;
    echo '  </td>'.PHP_EOL;

    echo '  <td>'.PHP_EOL;
    echo '     <label>'.($QTD_ENT - $QTD_SAI).'</label>'.PHP_EOL;
    echo '  </td>'.PHP_EOL;

    echo '  <td>'.PHP_EOL;
    echo '      <label title="Relatório" onclick="window.open(\'toner_relat.php?ton_codigo='.$tb_toner[$x]->TON_CODIGO.'&ton_descri='.$tb_toner[$x]->TON_DESCRI.'\',\'_parent\');">📄</label>'.PHP_EOL;      
    echo '  </td>'.PHP_EOL;

    echo '</tr>'.PHP_EOL;

}
?>
        </table>
    
</html>        
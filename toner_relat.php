<?php

    $toner_mov = [];

    //entrada
    $json = file_get_contents("tabelas/tb_toner_ent.json"); /* Abre o arquivo json --- ARQUIVO DA TABELA DE ENTRADA */
    $toner_ent = json_decode($json); /*decodifica o arquivo json */

    for ($te = 0; $te <= count($toner_ent) - 1; $te++) {

        if ( $toner_ent[$te]->TON_CODIGO == $_REQUEST['ton_codigo']){

            $linha = new StdClass();
            $linha->TON_CODIGO = $toner_ent[$te]->TON_CODIGO;
            $linha->TOM_DATA   = $toner_ent[$te]->TOE_DATA;
            $linha->TOM_QTDADE = $toner_ent[$te]->TOE_QTDADE;
            $linha->TOM_OBSERV = $toner_ent[$te]->TOE_OBSERV;
            $linha->TOM_STATUS = "E";

            array_push($toner_mov, $linha);  //  adicionei a linha na tabela
        }

    }

    //Saida
    $json = file_get_contents("tabelas/tb_toner_sai.json"); // Abre o arquivo json --- ARQUIVO DA TABELA DE SAIDA 
    $toner_sai = json_decode($json); //decodifica o arquivo json 

    for ($ts = 0; $ts <= count($toner_sai) - 1; $ts++) {

        if ( $toner_sai[$ts]->TON_CODIGO == $_REQUEST['ton_codigo']){

            $linha = new StdClass();
            $linha->TON_CODIGO = $toner_sai[$ts]->TON_CODIGO;
            $linha->TOM_DATA   = $toner_sai[$ts]->TOS_DATA;
            $linha->TOM_QTDADE = $toner_sai[$ts]->TOS_QTDADE;
            $linha->TOM_OBSERV = $toner_sai[$ts]->TOS_OBSERV;
            $linha->TOM_STATUS = "S";

            array_push($toner_mov, $linha);  //  adicionei a linha na tabela
        }

    }

    //|Ordena por orde de data
    usort($toner_mov, function($a, $b) { //Sort the array using a user defined function
        return $a->TOM_DATA < $b->TOM_DATA ? -1 : 1; //Compare the scores
    });         
    

    echo '<style>'.PHP_EOL;
    echo '  table, th, td {'.PHP_EOL;
    echo '    border: 1px solid black;'.PHP_EOL;
    echo '    border-collapse: collapse;'.PHP_EOL;
    echo '  }'.PHP_EOL;
    echo '</style>'.PHP_EOL;    


    echo 'Toner: '.$_REQUEST['ton_codigo'].' - '.$_REQUEST['ton_descri'].PHP_EOL;
    echo '<br>'.PHP_EOL;
    echo '<table>'.PHP_EOL;
    echo '    <tr>'.PHP_EOL;
    echo '        <th>Tipo</th>'.PHP_EOL;
    echo '        <th>Data</th>'.PHP_EOL;
    echo '        <th>Qtdade</th>'.PHP_EOL;
    echo '        <th>Saldo</th>'.PHP_EOL;
    echo '        <th>Observacao</th>'.PHP_EOL;
    echo '    </tr>'.PHP_EOL;

    $QTDADE_SALDO = 0;

    for ($tm = 0; $tm <= count($toner_mov) - 1; $tm++) {

            if ($toner_mov[$tm]->TOM_STATUS == 'E'){
                $QTDADE_SALDO = $QTDADE_SALDO + $toner_mov[$tm]->TOM_QTDADE;
            }else{
                $QTDADE_SALDO = $QTDADE_SALDO - $toner_mov[$tm]->TOM_QTDADE;
            }

            echo '<tr>'.PHP_EOL;
            echo '   <td>'.$toner_mov[$tm]->TOM_STATUS.'</td>'.PHP_EOL;
            echo '   <td>'.$toner_mov[$tm]->TOM_DATA.'</td>'.PHP_EOL;
            echo '   <td style="text-align: center; ">'.$toner_mov[$tm]->TOM_QTDADE.'</td>'.PHP_EOL;
            echo '   <td style="text-align: center; ">'.$QTDADE_SALDO.'</td>'.PHP_EOL;
            echo '   <td>'.$toner_mov[$tm]->TOM_OBSERV.'</td>'.PHP_EOL;
            echo '</tr>'.PHP_EOL;   

    }
    echo '    <tr>'.PHP_EOL;
    echo '        <th></th>'.PHP_EOL;
    echo '        <th></th>'.PHP_EOL;
    echo '        <th>Total</th>'.PHP_EOL;
    echo '        <th>'.$QTDADE_SALDO.'</th>'.PHP_EOL;
    echo '        <th></th>'.PHP_EOL;
    echo '    </tr>'.PHP_EOL;

    echo '</table>'.PHP_EOL;
  

?>

<input type="button" value="voltar" onclick="window.open('toner.php','_parent');"> <!--Botao para voltar para a pagina anterior-->
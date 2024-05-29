<?php
// gabriel 30042024 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

//LOG
$LOG_CAMINHO = defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
    $LOG_NIVEL = defineNivelLog();
    $identificacao = date("dmYHis") . "-PID" . getmypid() . "-" . "produtos";
    if (isset($LOG_NIVEL)) {
        if ($LOG_NIVEL >= 1) {
            $arquivo = fopen(defineCaminhoLog() . "prevenda_" . date("dmY") . ".log", "a");
        }
    }
}
if (isset($LOG_NIVEL)) {
    if ($LOG_NIVEL == 1) {
        fwrite($arquivo, $identificacao . "\n");
    }
    if ($LOG_NIVEL >= 2) {
        fwrite($arquivo, $identificacao . "-ENTRADA->" . json_encode($jsonEntrada) . "\n");
    }
}
//LOG

$produtos = array();


$progr = new chamaprogress();
$retorno = $progr->executarprogress("prevenda/app/1/produtos", json_encode($jsonEntrada));
fwrite($arquivo, $identificacao . "-RETORNO->" . $retorno . "\n");
$produtos = json_decode($retorno, true);
if (isset($produtos["conteudoSaida"][0])) { // Conteudo Saida - Caso de erro
    $produtos = $produtos["conteudoSaida"][0];
} else {

    if (!isset($produtos["produ"][1]) && ($jsonEntrada['dadosEntrada'][0]['procod'] != null)) {  // Verifica se tem mais de 1 registro
        $produtos = $produtos["produ"][0]; // Retorno sem array
    } else {
        $produtos = $produtos["produ"];
    }

}


$jsonSaida = $produtos;


//LOG
if (isset($LOG_NIVEL)) {
    if ($LOG_NIVEL >= 2) {
        fwrite($arquivo, $identificacao . "-SAIDA->" . json_encode($jsonSaida) . "\n\n");
    }
}
//LOG

fclose($arquivo);

?>
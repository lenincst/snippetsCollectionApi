<?php
 require_once __DIR__ . '/../server/config.php';
 require_once __DIR__ . '/../server/crest-master/src/crest.php';

$dados = $_REQUEST;

$dados_log = print_r($dados, true);

$log = "//----------------------------------------------------//".date('d/m/Y H:i:s').": ".PHP_EOL;
$log .= $dados_log.PHP_EOL."//----------------------------------------------------//";

file_put_contents(__DIR__ . '/logs.txt', $log, FILE_APPEND);

echo "To aqui!";

?>
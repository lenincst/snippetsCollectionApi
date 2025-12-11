<?php
 require_once __DIR__ . '/../server/config.php';
 require_once __DIR__ . '/../server/crest-master/src/crest.php';

$dados = $_REQUEST;

$dados_log = print_r($dados, true);
$tipo_de_chamado = $dados['event'];

$log = "\n//********//\n".date('d/m/Y H:i:s').": ".PHP_EOL;
$log .= $dados_log.PHP_EOL;

file_put_contents(__DIR__ . '/logs.json', $log, FILE_APPEND);

//----------------------------------------------------------------

if ($tipo_de_chamado == 'ONCRMDEALUPDATE' or $tipo_de_chamado == 'ONCRMDEALADD'){
    $id_negocio = $dados['data']['FIELDS']['ID'];

    $dados_negocio = CRest::call(
    'crm.deal.get',
    [
        'ID' => $id_negocio,
        ]
    
    );

    $dados_negocio = print_r($dados_negocio, true);



    file_put_contents(__DIR__ .'/negocio.json', $dados_negocio.PHP_EOL, FILE_APPEND);

}elseif($tipo_de_chamado == 'ONCRMDEALDELETE'){
}

echo "To aqui!";

?>
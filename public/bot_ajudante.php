<?php
require_once __DIR__ . '/../server/crest-master/src/crest.php';
require_once __DIR__ . '/../server/config.php';

$hora = date('d-m-Y H:i:s');
$pipeline = $pipelines['pipeline_00']['id'];

echo "Criando o negócio!".PHP_EOL;
$criacao = CRest::call(
    'crm.deal.add',
    [
        'FIELDS' => [
            'TITLE' => 'Bot Ajudante criou '.$hora,
            'CATEGORY_ID' => 169,
        ]
    ],
    
);
$id_negocio = $criacao['result'];
echo "Negocio criado, esperando 30segundos...".PHP_EOL;
sleep(30);
$alterar_etapa = CRest::call(
    'crm.deal.update',
    [
        'ID' => $id_negocio,
        'FIELDS' => [
            'STAGE_ID' => "C169:PREPAYMENT_INVOI",
        ]
    ]
);
if ($alterar_etapa['result']==true){
    echo "Negócio atualizado, verificar!";
}else{
    echo "Negócio não foi atualizado, verificar!".PHP_EOL;
}

?>
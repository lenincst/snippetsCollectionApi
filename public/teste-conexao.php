<?php
    require_once __DIR__ . '/../server/crest-master/src/crest.php';
    require_once __DIR__ . '/../server/config.php';

    $idPipeline = $pipelines['pipeline_00']['id'];
    echo "buscando detalhes da pipeline ". $idPipeline;

    $valor = CRest::call(
        'crm.status.entity.items',[
            'entityId' => "DEAL_STAGE_".$idPipeline
        ]
    );
    echo "</pre>";
    print_r($valor);
    echo "</pre>";
    
?>
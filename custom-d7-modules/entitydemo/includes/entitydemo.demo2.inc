<?php

function entitydemo_demo_2(){
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node');
    $result = $query->execute();
    dsm($result);


    $query = new EntityFieldQuery();
    $query->fieldCondition('field_image', 'height', 400, '>');
    $result = $query->execute();
    dsm($result);

    return 'This is a demo page.';
}
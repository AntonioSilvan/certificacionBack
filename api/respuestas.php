<?php
    include_once 'db.php';

    function respuestas(){
        $query="SELECT* FROM Respuestas";
        $response=getAll($query);
        return $response;
    }

    function respuestasAdd($array){
        $array=$array[0];
        $res_contenido=$array['res_contenido'];
        $res_correcta=$array['res_correcta'];
        $fk_pre_id=$array['fk_pre_id'];
        $fk_adm_id=$array['fk_adm_id'];
        $query="INSERT INTO Respuestas VALUES(null, '$res_contenido', $res_correcta, $fk_pre_id, 2 )";
        $response=numQuery($query);
    }
?>
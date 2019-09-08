<?php
    include_once 'db.php';

    function examen_preguntasAdd($array){
        if(count($array)>0){
            for($i=0; $i<=count($array); $i++){
                $fk_exa_id=$array[$i]['fk_exa_id'];
                $fk_pre_id=$array[$i]['fk_pre_id'];
                $query="INSERT INTO Examen_Preguntas VALUES (null, null, $fk_exa_id, $fk_pre_id )";
                $response=numQuery($query);
            }
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }
?>
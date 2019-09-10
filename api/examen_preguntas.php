<?php
    include_once 'db.php';

    function examen_preguntasAdd($array){
        if(count($array)>0){
            for($i=0; $i<count($array); $i++){
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

    function examen_preguntas($array){
        if(count($array)>0 && $array[0]['fk_exa_id']>0 && $array[0]['fk_pre_id']>0){
            $array=$array[0];
            $fk_exa_id=$array['fk_exa_id'];
            $fk_pre_id=$array['fk_pre_id'];
            $query="SELECT * FROM Examen_Preguntas WHERE fk_exa_id=$fk_exa_id AND fk_pre_id=$fk_pre_id";
            $response=getAll($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }

    function disPreguntas($array){
        if(count($array)>0 && $array[0]['fk_exa_id']>0){
            $fk_exa_id=$array[0]['fk_exa_id'];
            $query="SELECT * FROM Preguntas WHERE pre_id NOT IN(SELECT fk_pre_id FROM Examen_Preguntas WHERE fk_exa_id=$fk_exa_id)";
            $response=getAll($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
        //SELECT * FROM `preguntas` WHERE pre_id NOT IN(SELECT fk_pre_id from examen_preguntas where fk_exa_id=4)
    }

    function avaPreguntas($array){
        if(count($array)>0 && $array[0]['fk_exa_id']>0){
            $fk_exa_id=$array[0]['fk_exa_id'];
            $query="SELECT * FROM Preguntas WHERE pre_id IN(SELECT fk_pre_id FROM Examen_Preguntas WHERE fk_exa_id=$fk_exa_id)";
            $response=getAll($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }
?>
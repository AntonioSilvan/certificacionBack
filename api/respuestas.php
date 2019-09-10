<?php
    include_once 'db.php';

    function respuestas(){
        $query="SELECT* FROM Respuestas";
        $response=getAll($query);
        return convertUtf8($response);
    }

    function respuestasAdd($array){
        if(count($array)>0 && $array[0]['res_contenido']!="" && $array[0]['res_correcta']!=""){
            $array=$array[0];
            $res_contenido=$array['res_contenido'];
            $res_correcta=$array['res_correcta'];
            $fk_pre_id=$array['fk_pre_id'];
            $fk_adm_id=$array['fk_adm_id'];
            $query="INSERT INTO Respuestas VALUES(null, '$res_contenido', $res_correcta,null,1, $fk_pre_id, $fk_adm_id)";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }

    function respuestasUpdate($array){
        if(count($array)>0 && $array[0]['res_id']>0 && $array[0]['res_contenido']!=""){
            $array=$array[0];
            $res_id=$array['res_id'];
            $res_contenido=$array['res_contenido'];
            $query="UPDATE Respuestas SET res_contenido='$res_contenido' WHERE res_id=$res_id";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }

    function respuestasDelete($array){
        if(count($array)>0 && $array[0]['res_id']>0){
            $array=$array[0];
            $res_id=$array['res_id'];
            $query="DELETE FROM Respuestas WHERE res_id=$res_id";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }

    function respuestasPreg($array){
        if(count($array)>0 && $array[0]['fk_pre_id']>0 && $array[0]['fk_adm_id']>0){
            $array=$array[0];
            $fk_pre_id=$array['fk_pre_id'];
            $fk_adm_id=$array['fk_adm_id'];
            $query="SELECT* FROM respuestas WHERE fk_pre_id=$fk_pre_id AND fk_adm_id=$fk_adm_id";
            $response=getAll($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }

    function respuestasExam($array){
        if(count($array)>0 && $array[0]['fk_pre_id']>0){
            $array=$array[0];
            $fk_pre_id=$array['fk_pre_id'];
            $query="SELECT* FROM respuestas WHERE fk_pre_id=$fk_pre_id";
            $response=getAll($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }
?>
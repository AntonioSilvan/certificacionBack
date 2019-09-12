<?php
    include_once "db.php";

    function preguntas(){
        $query="SELECT * FROM Preguntas";
        $response = getAll($query);
        return convertUtf8($response);

    }

    function preguntasAdd($array){
        if(count($array)>0 && $array[0]['pre_contenido']!=""){
            $array=$array[0];
            $pre_contenido=$array['pre_contenido'];
            $fk_adm_id=$array['fk_adm_id'];
            $query="INSERT INTO Preguntas VALUES (null,'$pre_contenido',null, 1, $fk_adm_id)";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }

    function preguntasUpdate($array){
        if(count($array)>0 && $array[0]['pre_contenido']!="" &&$array[0]['pre_id']>0){
            $array=$array[0];
            $pre_id=$array['pre_id'];
            $pre_contenido=$array['pre_contenido'];
            $query="UPDATE Preguntas SET pre_contenido='$pre_contenido' WHERE pre_id=$pre_id";
            $response=numQuery($query);    
        }else{
            $response=$NoQuery();
        }
        return convertUtf8($response);
    }

    function preguntasDelete($array){
        if(count($array)>0&& $array[0]['pre_id']>0){
            $array=$array[0];
            $pre_id=$array['pre_id'];
            $query="DELETE FROM Preguntas WHERE pre_id=$pre_id";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }
?>

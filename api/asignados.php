<?php
    include_once 'db.php';

    function asignadosAdd($array){
        if(count($array)>0 && $array[0]['fk_use_id']>0 && $array[0]['fk_exa_id']>0){
            $fk_use_id=$array[0]['fk_use_id'];
            $fk_exa_id=$array[0]['fk_exa_id'];
            $query="INSERT INTO Asignados VALUES(null, null, 1, $fk_use_id, $fk_exa_id)";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }

    function valAsignados($array){
        if(count($array)>0 && $array[0]['fk_use_id']>0){
            $fk_use_id=$array[0]['fk_use_id'];
            $query="SELECT * FROM Asignados WHERE fk_use_id=$fk_use_id AND asi_status=1";
            $response=getAll($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }
?>
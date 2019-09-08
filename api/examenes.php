<?php
    include_once 'db.php';

    function examenes(){
        $query="SELECT * FROM Examen";
        $response=getAll($query);
        return convertUtf8($response);
    }

    function examenesOne($array){
        if(count($array)>0 && $array['exa_id']!=""){
            $exa_id=$array[0]['exa_id'];
            $query="SELECT* FROM Examen WHERE exa_id=$exa_id";
            $response=getAll($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }

    function examenesAdd($array){
        if (count($array)>0 && $array[0]['exa_nombre']!="" && $array[0]['fk_adm_id']>0){
            $array=$array[0];
            $exa_nombre=$array['exa_nombre'];
            $fk_adm_id=$array['fk_adm_id'];
            $query="INSERT INTO Examen VALUES(null, '$exa_nombre', null,1, $fk_adm_id)";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
    }
?>
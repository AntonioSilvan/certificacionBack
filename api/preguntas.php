<?php
    include_once "db.php";

    function preguntas(){
        $query="SELECT * FROM Preguntas";
        $response = getAll($query);
        return convertUtf8($response);

    }

    function preguntasAdd($array){
        if(count($array>0) && $array[0]['pre_contenido']!=""){
            $array=$array[0];
            $pre_contenido=$array['pre_contenido'];
            $query="INSERT INTO Preguntas VALUES (null,'$pre_contenido',null, null, 1)";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return $response;
    }
?>

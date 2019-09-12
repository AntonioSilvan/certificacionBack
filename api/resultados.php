<?php
    include_once 'db.php';

    function resultado($array){
        $total_preguntas=count($array);
        $query="SELECT COUNT(res_id) FROM Respuestas WHERE res_correcta=1 AND res_id IN(";
        for($i=0; $i<count($array); $i++){
            $query.=$array[$i]['res_id'];
            if($i<(count($array)-1)){
                $query.=",";
            }else{
                $query.=")";
            }
        }
        $response=getAll($query);
        $calificacion[]=['res_final'=>($response[0]['COUNT(res_id)']/$total_preguntas)*100];
        return convertUtf8($calificacion);
    }
?>
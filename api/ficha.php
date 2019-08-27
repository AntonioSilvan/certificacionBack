<?php
    include_once 'db.php';

    function fichas($use_id){
        $query="SELECT* FROM Ficha WHERE fk_use_id=$use_id";
        $response=getAll($query);
        return convertUtf8($response);
    }
?>
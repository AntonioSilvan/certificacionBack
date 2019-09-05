<?php
    include_once 'db.php';

    function fichas($use_id){
        $query="SELECT* FROM Ficha WHERE fk_use_id=$use_id";
        $response=getAll($query);
        return convertUtf8($response);
    }

    function fichasAdd($fk_use_id, $img_ficha){
        //Formamos la ruta para subir la ficha
        $uploadRuta=$_SERVER['DOCUMENT_ROOT']."/certificacionBack/ficha/$fk_use_id/";

        //Obtenemos la extencion de archivo para mandatlo como parametro
        $img_name=$img_ficha['name'];
        $extencion=pathinfo($img_name, PATHINFO_EXTENSION);

        //Nombre temporal
        $tmp_name=$img_ficha['tmp_name'];

        $query="INSERT INTO Ficha VALUES (null,'ruta',null,1,$fk_use_id)";
        $response=insertFicha($query, $uploadRuta, $extencion, $tmp_name);


        
    }
?>
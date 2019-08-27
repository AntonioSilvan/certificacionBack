<?php
    $host="localhost";
    $dbName="certificacion";
    $password="";
    $user="root";

    try{
        $conn=new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexion establecida";
    }catch(PDOException $e){
        echo "Conexion fallida: ".$e->getMessage();
    }


    //GUARDAR, MODIFICAR, ELIMINAR
    function numQuery($query, &$conn=null){
        if(!$conn)global $conn;
        
        $consulta=$conn->prepare($query);
        $consulta->execute();
        if($consulta->rowCount()>0){
            $result[]=['status'=>true];
        }else{
            $result[]=['status'=>false];
        }
        return $result;
    }

    //SELECCIONAR
    function getAll($query, &$conn=null){
        if(!$conn)global $conn;
        
        $consulta=$conn->prepare($query);
        $consulta->execute();
        $result=$consulta->fetchAll(PDO::FETCH_ASSOC);
        if (count($result)==0){
            $result[]=['status'=>false];
        }
        return $result;

    }

    //RETURN FALSE
    function NoQuery(){
        $result[]=['status'=>false];
        return $result;
    }


    //UTF-8

    function convertUtf8($array){
        array_walk_recursive($array,function(&$item, $key){
            if(!mb_detect_encoding($item,'utf-8',true)){
                $item=utf8_encode($item);
            }
        });
        return $array;
    }
?>
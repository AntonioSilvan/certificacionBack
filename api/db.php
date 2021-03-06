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

    //INSERTAR USUARIO
    function insertUser($query, &$conn=null){
        if(!$conn)global $conn;
        $consulta=$conn->prepare($query);
        $consulta->execute();
        if($consulta->rowCount()>0){
            $last_id=$conn->lastInsertId();
            mkdir("../ficha/$last_id");
            $result[]=['status'=>true];
        }else{
            $result[]=['status'=>false];
        }
        return $result;
    }

    function insertFicha($query, $uploadRuta, $viewRuta, $extencion, $tmp_name, &$conn=null){
        if(!$conn)global $conn;
        $consulta=$conn->prepare($query);
        $consulta->execute();
        if($consulta->rowCount()>0){
           
            $last_id=$conn->lastInsertId();
            $queryUpdate="UPDATE Ficha SET fic_ruta='$viewRuta$last_id.$extencion' WHERE fic_id=$last_id";
            $consultaUpdate=$conn->prepare($queryUpdate);
            $consultaUpdate->execute();
            move_uploaded_file($tmp_name, $uploadRuta."$last_id.$extencion");
            $result[]=['status'=>true];
        }else{
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
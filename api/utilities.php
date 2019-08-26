<?php 
    require_once 'db.php';

    //Administradores
    function administradores(){
        $query="SELECT* FROM Administradores";
        $response=getAll($query);
        return convertUtf8($response);
    }
    function administradoresOne($adm_id){
        $query="SELECT* FROM Administradores WHERE adm_id=$adm_id";
        $response=getAll($query);
        return convertUtf8($response);
    }

    function administradoresAdd($array){
        if(count($array>0) && $array[0]['adm_nombre']!="" && $array[0]['adm_ap_paterno']!="" && $array[0]['adm_ap_materno']!="" && $array[0]['adm_correo']!="" && $array[0]['adm_password']!=""){
            $adm_nombre=$array[0]['adm_nombre'];
            $adm_ap_paterno=$array[0]['adm_ap_paterno'];
            $adm_ap_materno=$array[0]['adm_ap_materno'];
            $adm_correo=$array[0]['adm_correo'];
            $adm_password=$array[0]['adm_password'];

            $query="INSERT INTO Administradores  VALUES (null, '$adm_nombre', '$adm_ap_paterno', '$adm_ap_materno', '$adm_correo', '$adm_password')";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);

    }

    function administradoresLogin($array){
        $adm_correo=$array[0]['adm_correo'];
        $adm_password=$array[0]['adm_password'];

        $query="SELECT* FROM Administradores WHERE adm_correo='$adm_correo' AND adm_password='$adm_password'";
        $response=getAll($query);
        return convertUtf8($response);
    }
?>
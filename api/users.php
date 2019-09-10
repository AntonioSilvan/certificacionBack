<?php
    include_once "db.php";

     function users(){
         $query="SELECT* FROM Users";
         $response=getAll($query);
         return convertUtf8($response);
     }

     function usersOne($use_id){
         $query="SELECT* FROM Users WHERE use_id=$use_id";
         $response=getAll($query);
         return convertUtf8($response);
     }

     function usersLogin($array){
        if(count($array)>0 && $array[0]['use_correo']!=""&&$array[0]['use_password']!=""){
            $array=$array[0];
            $use_correo=$array['use_correo'];
            $use_password=$array['use_password'];
            $query="SELECT* FROM Users WHERE use_correo='$use_correo' AND use_password='$use_password'";
            $response=getAll($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
     }

     function UsersAdd($array){
         if(count($array)>0 && $array[0]['use_nombre']!="" && $array[0]['use_ap_paterno']!="" && $array[0]['use_ap_materno']!="" && $array[0]['use_curp']!=""
             && $array[0]['use_rfc']!="" && $array[0]['use_correo']!="" && $array[0]['use_password']!=""&&$array[0]['use_pais']!=""&&$array[0]['use_estado']!=""&&$array[0]['use_municipio']!=""
             &&$array[0]['use_colonia']!=""&&$array[0]['use_calle']!=""&&$array[0]['use_numero']!="" ){
            
            $array=$array[0];
             $use_nombre=$array['use_nombre'];
             $use_ap_paterno=$array['use_ap_paterno'];
             $use_ap_materno=$array['use_ap_materno'];
             $use_curp=$array['use_curp'];
             $use_rfc=$array['use_rfc'];
             $use_correo=$array['use_correo'];
             $use_password=$array['use_password'];
             $use_pais=$array['use_pais'];
             $use_estado=$array['use_estado'];
             $use_municipio=$array['use_municipio'];
             $use_colonia=$array['use_colonia'];
             $use_calle=$array['use_calle'];
             $use_numero=$array['use_numero'];

             $query="INSERT INTO Users values (null,'$use_nombre','$use_ap_paterno','$use_ap_materno','$use_curp','$use_rfc','$use_correo','$use_password',null,'$use_pais','$use_estado','$use_municipio','$use_colonia','$use_calle','$use_numero')";
             $response = insertUser($query);
         }else{
             $response=NoQuery();
         }
         return convertUtf8($response);
     }

     function usersDelete($array){
        if(count($array)>0 && $array[0]['use_id']>0){
            $use_id=$array[0]['use_id'];
            $query="DELETE FROM Users WHERE use_id=$use_id";
            $response=numQuery($query);
        }else{
            $response=NoQuery();
        }
        return convertUtf8($response);
     }
?>

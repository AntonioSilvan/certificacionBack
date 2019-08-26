<?php
    include_once "db.php";

     function users(){
         $query="SELECT* FROM Users";
         $response=getAll($query);
         return convertUtf8($response);
     }

     function UsersAdd($array){
         if(count($array>0) && $array[0]['use_nombre']!="" && $array[0]['use_ap_paterno']!="" && $array[0]['use_ap_materno']!="" && $array[0]['use_curp']!=""
             && $array[0]['use_rfc']!="" && $array[0]['use_correo']!="" && $array[0]['use_password']!=""){

             $use_nombre=$array[0]['use_nombre'];
             $use_ap_paterno=$array[0]['use_ap_paterno'];
             $use_ap_materno=$array[0]['use_ap_materno'];
             $use_curp=$array[0]['use_curp'];
             $use_rfc=$array[0]['use_rfc'];
             $use_correo=$array[0]['use_correo'];
             $use_password=$array[0]['use_password'];

             $query="INSERT INTO Userss values (null,'$use_nombre','$use_ap_paterno','$use_ap_materno','$use_curp','$use_rfc','$use_correo','$use_password')";
             $response = numQuery($query);
         }else{
             $response=NoQuery();
         }
         return convertUtf8($response);
     }
?>

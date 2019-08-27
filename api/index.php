<?php 
    include_once 'utilities.php';
    include_once 'users.php';
    include_once 'preguntas.php';
    include_once 'respuestas.php';
    include_once 'ficha.php';


    if(isset($_GET['url'])){

        //METODO GET
        $request=$_GET['url'];
        if($_SERVER['REQUEST_METHOD']=='GET'){

            //SWITCH
            switch($request){
                case "administradores":$response=administradores();print_r(json_encode($response));break;
                case "users":$response=users();print_r(json_encode($response));break;
                case "preguntas":$response=preguntas();print_r(json_encode($response));break;
                case "respuestas":$response=respuestas();print_r(json_encode($response));break;

                case "administradoresOne":$response=administradoresOne($_GET['adm_id']);print_r(json_encode($response));break;
                case "fichas":$response=fichas($_GET['use_id']);print_r(json_encode($response));break;
    
            }
//************************************************************************************************ */
    
    
            
            //METODO POST
        }else if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=file_get_contents("php://input");
            $arrayData=json_decode($data, true);

            //VALIDAMOS QUE SOLO RECIBA JSON
            if(json_last_error()==0){
                //SWITCH
                switch($request){
                    case "administradoresAdd":$response=administradoresAdd($arrayData);print_r(json_encode($response));break;
                    case "usersAdd":$response=usersAdd($arrayData);print_r(json_encode($response));break;
                    case "preguntasAdd":$response=preguntasAdd($arrayData);print_r(json_encode($response));break;
                    case "respuestasAdd":$response=respuestasAdd($arrayData);print_r(json_encode($response));break;

                    case "administradoresLogin":$response=administradoresLogin($arrayData);print_r(json_encode($response));break;
                }
            }else{

            }
//******************************************************************************************************* */
        

            //METODO NO PERMITIDO
        }else{
            http_response_code(405);
        }
    }else{
        $error=array('mensaje'=>'Error en parametros get');
        print_r(json_encode($error));
    }

   

?>
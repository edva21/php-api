<?php
/**
 * Created by IntelliJ IDEA.
 * User: eddy
 * Date: 12/03/19
 * Time: 05:25 PM
 */
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/Database.php';
include_once '../objects/Usuario.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$usuario = new Usuario($db);

// set ID property of record to read
$usuario->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of product to be edited
$usuario->readOne();

if($usuario->name!=null){
    // create array
    $usuario_arr = array(
        "cedula" =>  $usuario->cedula,
        "id" => $usuario->id,
        "apellidos" => $usuario->apellidos,
        "nombre" => $usuario->nombre,
        "hash" => $usuario->hash,
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($usuario_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(array("message" => "Usuario does not exist."));
}
?>
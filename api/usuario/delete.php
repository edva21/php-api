<?php
/**
 * Created by IntelliJ IDEA.
 * User: eddy
 * Date: 12/03/19
 * Time: 05:19 PM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../config/Database.php';
include_once '../objects/Usuario.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$usuario = new Usuario($db);

// get product id
$data = json_decode(file_get_contents("php://input"));

// set product id to be deleted
$usuario->id = $data->id;

// delete the product
if($usuario->delete()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Usuario was deleted."));
}

// if unable to delete the product
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to delete product."));
}
?>
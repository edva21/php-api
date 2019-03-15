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
include_once '../objects/Item.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$item = new Item($db);

// set ID property of record to read
$item->id = isset($_GET['id']) ?  $_GET['id'] : die();
$item->id=$item->id;


// read the details of product to be edited
$item->readOne();

if($item->id!=null){
    // create array
    $item_arr = array(
        "id" => $item->id,
        "servicio" => $item->servicio,
        "nombreDeContacto" => $item->nombreDeContacto,
        "correoElectronico1" => $item->correoElectronico1,
        "correoElectronico2" => $item->correoElectronico2,
        "empresa" => $item->empresa,
        "telefono" => $item->telefono,
        "direccion" => $item->direccion,
        "fecha" => $item->fecha,
        "tipoUnidad1" => $item->tipoUnidad1,
        "espaciosRequeridos" => $item->espaciosRequeridos,
        "tipoUnidad2" => $item->tipoUnidad2,
        "descripcionDeMercancia" => $item->descripcionDeMercancia,
        "razonSocial_fac" => $item->razonSocial_fac,
        "cedulaJuridicaOFisica_fac" => $item->cedulaJuridicaOFisica_fac,
        "nombreRepresentanteLegal_fac" => $item->nombreRepresentanteLegal_fac,
        "cedulaRepresentanteLegal_fac" => $item->cedulaRepresentanteLegal_fac,
        "provincia_fac" => $item->provincia_fac,
        "canton_fac" => $item->canton_fac,
        "distrito_fac" => $item->distrito_fac,
        "barrio_fac" => $item->barrio_fac,
        "direccion_fac" => $item->direccion_fac,
        "correoEncargadoFacturaElectronica_fac" => $item->correoEncargadoFacturaElectronica_fac,
        "telefonoOficina_fac" => $item->telefonoOficina_fac,
        "numeroReserva_fac" => $item->numeroReserva_fac,
        "creacion" => $item->creacion,
        "_hash" => $item->_hash
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($item_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(array("message" => "Item does not exist."));
}
?>
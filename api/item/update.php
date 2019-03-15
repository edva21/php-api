<?php
/**
 * Created by IntelliJ IDEA.
 * User: eddy
 * Date: 12/03/19
 * Time: 05:47 PM
 */
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/Database.php';
include_once '../objects/Item.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$item = new Item($db);

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of product to be edited
$item->id = $data->id;

// set product property values
$item->servicio = $data->servicio;
$item->nombreDeContacto = $data->nombreDeContacto;
$item->correoElectronico1 = $data->correoElectronico1;
//$item->correoElectronico2 = $data->correoElectronico2;
$item->empresa = $data->empresa;
$item->telefono = $data->telefono;
$item->direccion = $data->direccion;
$item->fecha = $data->fecha;
$item->tipoUnidad1 = $data->tipoUnidad1;
$item->espaciosRequeridos = $data->espaciosRequeridos;
$item->tipoUnidad2 = $data->tipoUnidad1;
$item->descripcionDeMercancia = $data->descripcionDeMercancia;
$item->razonSocial_fac = $data->razonSocial_fac;
$item->cedulaJuridicaOFisica_fac = $data->cedulaJuridicaOFisica_fac;
$item->nombreRepresentanteLegal_fac = $data->nombreRepresentanteLegal_fac;
$item->cedulaRepresentanteLegal_fac = $data->cedulaRepresentanteLegal_fac;
$item->provincia_fac = $data->provincia_fac;
$item->canton_fac = $data->canton_fac;
$item->distrito_fac = $data->distrito_fac;
$item->barrio_fac = $data->barrio_fac;
$item->direccion_fac = $data->direccion_fac;
$item->correoEncargadoFacturaElectronica_fac = $data->correoEncargadoFacturaElectronica_fac;
$item->telefonoOficina_fac = $data->telefonoOficina_fac;
$item->numeroReserva_fac = $data->numeroReserva_fac;
$item->creacion = $data->creacion;
$item->_hash = $data->_hash;

// update the product
if($item->update()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Item was updated."));
}

// if unable to update the product, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update product."));
}   
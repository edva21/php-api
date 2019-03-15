<?php
/**
 * Created by IntelliJ IDEA.
 * User: eddy
 * Date: 12/03/19
 * Time: 05:13 PM
 */
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/Database.php';

// instantiate product object
include_once '../objects/Item.php';

$database = new Database();
$db = $database->getConnection();

$item = new Item($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(true
    /*!empty($data->id)&&
    !empty($data->servicio)&&
    !empty($data->nombreDeContacto)&&
    !empty($data->correoElectronico1)&&
    !empty($data->correoElectronico2)&&
    !empty($data->empresa)&&
    !empty($data->telefono)&&
    !empty($data->direccion)&&
    !empty($data->fecha)&&
    !empty($data->tipoUnidad1)&&
    !empty($data->espaciosRequeridos)&&
    !empty($data->tipoUnidad2)&&
    !empty($data->descripcionDeMercancia)&&
    !empty($data->razonSocial_fac)&&
    !empty($data->cedulaJuridicaOFisica_fac)&&
    !empty($data->nombreRepresentanteLegal_fac)&&
    !empty($data->cedulaRepresentanteLegal_fac)&&
    !empty($data->provincia_fac)&&
    !empty($data->canton_fac)&&
    !empty($data->distrito_fac)&&
    !empty($data->barrio_fac)&&
    !empty($data->direccion_fac)&&
    !empty($data->correoEncargadoFacturaElectronica_fac)&&
    !empty($data->telefonoOficina_fac)&&
    !empty($data->numeroReserva_fac)&&
    !empty($data->creacion)&&
    !empty($data->_hash)*/
){

    // set product property values
    $item->id = $data->id;
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

    // create the product
    if($item->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Item was created."));
    }

    // if unable to create the product, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create Item."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>
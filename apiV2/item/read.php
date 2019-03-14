<?php
/**
 * Created by IntelliJ IDEA.
 * User: eddy
 * Date: 12/03/19
 * Time: 05:43 PM
 */
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/Database.php';
include_once '../objects/Item.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$item = new Item($db);

// query products
$stmt = $item->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $items_arr=array();
    $items_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $item_item=array(//nombre,apellidos,cedula,id,creacion,hash
            /*"id" => $item->id,
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
            "_hash" => $item->_hash*/
            "id" => $row['id'],
            "servicio" => $row['servicio'],
            "nombreDeContacto" => $row['nombreDeContacto'],
            "correoElectronico1" => $row['correoElectronico1'],
            "correoElectronico2" => $row['correoElectronico2'],
            "empresa" => $row['empresa'],
            "telefono" => $row['telefono'],
            "direccion" => $row['direccion'],
            "fecha" => $row['fecha'],
            "tipoUnidad1" => $row['tipoUnidad1'],
            "espaciosRequeridos" => $row['espaciosRequeridos'],
            "tipoUnidad2" => $row['tipoUnidad2'],
            "descripcionDeMercancia" => $row['descripcionDeMercancia'],
            "razonSocial_fac" => $row['razonSocial_fac'],
            "cedulaJuridicaOFisica_fac" => $row['cedulaJuridicaOFisica_fac'],
            "nombreRepresentanteLegal_fac" => $row['nombreRepresentanteLegal_fac'],
            "cedulaRepresentanteLegal_fac" => $row['cedulaRepresentanteLegal_fac'],
            "provincia_fac" => $row['provincia_fac'],
            "canton_fac" => $row['canton_fac'],
            "distrito_fac" => $row['distrito_fac'],
            "barrio_fac" => $row['barrio_fac'],
            "direccion_fac" => $row['direccion_fac'],
            "correoEncargadoFacturaElectronica_fac" => $row['correoEncargadoFacturaElectronica_fac'],
            "telefonoOficina_fac" => $row['telefonoOficina_fac'],
            "numeroReserva_fac" => $row['numeroReserva_fac'],
            "creacion" => $row['creacion'],
            "_hash" => $row['_hash']
        );

        array_push($items_arr["records"], $item_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($items_arr);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}

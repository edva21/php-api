<?php
/**
 * Created by IntelliJ IDEA.
 * User: eddy
 * Date: 12/03/19
 * Time: 01:15 PM
 */

class Item
{

    // database connection and table name
    private $conn;
    private $table_name = "item";

    // object properties
public $id;
public $servicio;
public $nombreDeContacto;
public $correoElectronico1;
public $correoElectronico2;
public $empresa;
public $telefono;
public $direccion;
public $fecha;
public $tipoUnidad1;
public $espaciosRequeridos;
public $tipoUnidad2;
public $descripcionDeMercancia;
public $razonSocial_fac;
public $cedulaJuridicaOFisica_fac;
public $nombreRepresentanteLegal_fac;
public $cedulaRepresentanteLegal_fac;
public $provincia_fac;
public $canton_fac;
public $distrito_fac;
public $barrio_fac;
public $direccion_fac;
public $correoEncargadoFacturaElectronica_fac;
public $telefonoOficina_fac;
public $numeroReserva_fac;
public $creacion;
public $_hash;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    function read(){

        // select all query
        $query = "SELECT id,servicio,nombreDeContacto,
        correoElectronico1,correoElectronico2,empresa,
        telefono,direccion,fecha,tipoUnidad1,
        espaciosRequeridos,tipoUnidad2,
        descripcionDeMercancia,razonSocial_fac,
        cedulaJuridicaOFisica_fac,
        nombreRepresentanteLegal_fac,
        cedulaRepresentanteLegal_fac,provincia_fac,
        canton_fac,distrito_fac,barrio_fac,
        direccion_fac,
        correoEncargadoFacturaElectronica_fac,
        telefonoOficina_fac,numeroReserva_fac,creacion,_hash
            FROM
                " . $this->table_name;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    // create product
    function create(){

        // query to insert record
        $query = "INSERT INTO item(servicio, nombreDeContacto, correoElectronico1, correoElectronico2, empresa, telefono, direccion,
                 fecha, tipoUnidad1, espaciosRequeridos, tipoUnidad2, descripcionDeMercancia, razonSocial_fac,
                 cedulaJuridicaOFisica_fac, nombreRepresentanteLegal_fac, cedulaRepresentanteLegal_fac, provincia_fac,
                 canton_fac, distrito_fac, barrio_fac, direccion_fac, correoEncargadoFacturaElectronica_fac,
                 telefonoOficina_fac, numeroReserva_fac, creacion,_hash) 
                  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        // prepare query
        $stmt = $this->conn->prepare($query);


        $this->servicio=htmlspecialchars(strip_tags($this->servicio));
        $this->nombreDeContacto=htmlspecialchars(strip_tags($this->nombreDeContacto));
        $this->correoElectronico1=htmlspecialchars(strip_tags($this->correoElectronico1));
        $this->correoElectronico2=htmlspecialchars(strip_tags($this->correoElectronico2));
        $this->empresa=htmlspecialchars(strip_tags($this->empresa));
        $this->telefono=htmlspecialchars(strip_tags($this->telefono));
        $this->direccion=htmlspecialchars(strip_tags($this->direccion));
        $this->fecha=htmlspecialchars(strip_tags($this->fecha));
        $this->tipoUnidad1=htmlspecialchars(strip_tags($this->tipoUnidad1));
        $this->espaciosRequeridos=htmlspecialchars(strip_tags($this->espaciosRequeridos));
        $this->tipoUnidad2=htmlspecialchars(strip_tags($this->tipoUnidad2));
        $this->descripcionDeMercancia=htmlspecialchars(strip_tags($this->descripcionDeMercancia));
        $this->razonSocial_fac=htmlspecialchars(strip_tags($this->razonSocial_fac));
        $this->cedulaJuridicaOFisica_fac=htmlspecialchars(strip_tags($this->cedulaJuridicaOFisica_fac));
        $this->nombreRepresentanteLegal_fac=htmlspecialchars(strip_tags($this->nombreRepresentanteLegal_fac));
        $this->cedulaRepresentanteLegal_fac=htmlspecialchars(strip_tags($this->cedulaRepresentanteLegal_fac));
        $this->provincia_fac=htmlspecialchars(strip_tags($this->provincia_fac));
        $this->canton_fac=htmlspecialchars(strip_tags($this->canton_fac));
        $this->distrito_fac=htmlspecialchars(strip_tags($this->distrito_fac));
        $this->barrio_fac=htmlspecialchars(strip_tags($this->barrio_fac));
        $this->direccion_fac=htmlspecialchars(strip_tags($this->direccion_fac));
        $this->correoEncargadoFacturaElectronica_fac=htmlspecialchars(strip_tags($this->correoEncargadoFacturaElectronica_fac));
        $this->telefonoOficina_fac=htmlspecialchars(strip_tags($this->telefonoOficina_fac));
        $this->numeroReserva_fac=htmlspecialchars(strip_tags($this->numeroReserva_fac));

        // bind values
        $stmt->bindParam(1,$this->servicio);
        $stmt->bindParam(2,$this->nombreDeContacto);
        $stmt->bindParam(3,$this->correoElectronico1);
        $stmt->bindParam(4,$this->correoElectronico2);
        $stmt->bindParam(5,$this->empresa);
        $stmt->bindParam(6,$this->telefono);
        $stmt->bindParam(7,$this->direccion);
        $stmt->bindParam(8,$this->fecha);
        $stmt->bindParam(9,$this->tipoUnidad1);
        $stmt->bindParam(10,$this->espaciosRequeridos);
        $stmt->bindParam(11,$this->tipoUnidad2);
        $stmt->bindParam(12,$this->descripcionDeMercancia);
        $stmt->bindParam(13,$this->razonSocial_fac);
        $stmt->bindParam(14,$this->cedulaJuridicaOFisica_fac);
        $stmt->bindParam(15,$this->nombreRepresentanteLegal_fac);
        $stmt->bindParam(16,$this->cedulaRepresentanteLegal_fac);
        $stmt->bindParam(17,$this->provincia_fac);
        $stmt->bindParam(18,$this->canton_fac);
        $stmt->bindParam(19,$this->distrito_fac);
        $stmt->bindParam(20,$this->barrio_fac);
        $stmt->bindParam(21,$this->direccion_fac);
        $stmt->bindParam(22,$this->correoEncargadoFacturaElectronica_fac);
        $stmt->bindParam(23,$this->telefonoOficina_fac);
        $stmt->bindParam(24,$this->numeroReserva_fac);
        $stmt->bindParam(25,$this->creacion);
        $stmt->bindParam(26,$this->_hash);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
    // used when filling up the update product form
    function readOne(){

        // query to read single record
            $query = "SELECT id,servicio,nombreDeContacto,
            correoElectronico1,correoElectronico2,empresa,
            telefono,direccion,fecha,tipoUnidad1,
            espaciosRequeridos,tipoUnidad2,
            descripcionDeMercancia,razonSocial_fac,
            cedulaJuridicaOFisica_fac,
            nombreRepresentanteLegal_fac,
            cedulaRepresentanteLegal_fac,provincia_fac,
            canton_fac,distrito_fac,barrio_fac,
            direccion_fac,
            correoEncargadoFacturaElectronica_fac,
            telefonoOficina_fac,numeroReserva_fac,creacion,_hash
            FROM
                " . $this->table_name .
            " WHERE
                id = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1,$this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id = $row['id'];
        $this->servicio = $row['servicio'];
        $this->nombreDeContacto = $row['nombreDeContacto'];
        $this->correoElectronico1 = $row['correoElectronico1'];
        $this->correoElectronico2 = $row['correoElectronico2'];
        $this->empresa = $row['empresa'];
        $this->telefono = $row['telefono'];
        $this->direccion = $row['direccion'];
        $this->fecha = $row['fecha'];
        $this->tipoUnidad1 = $row['tipoUnidad1'];
        $this->espaciosRequeridos = $row['espaciosRequeridos'];
        $this->tipoUnidad2 = $row['tipoUnidad2'];
        $this->descripcionDeMercancia = $row['descripcionDeMercancia'];
        $this->razonSocial_fac = $row['razonSocial_fac'];
        $this->cedulaJuridicaOFisica_fac = $row['cedulaJuridicaOFisica_fac'];
        $this->nombreRepresentanteLegal_fac = $row['nombreRepresentanteLegal_fac'];
        $this->cedulaRepresentanteLegal_fac = $row['cedulaRepresentanteLegal_fac'];
        $this->provincia_fac = $row['provincia_fac'];
        $this->canton_fac = $row['canton_fac'];
        $this->distrito_fac = $row['distrito_fac'];
        $this->barrio_fac = $row['barrio_fac'];
        $this->direccion_fac = $row['direccion_fac'];
        $this->correoEncargadoFacturaElectronica_fac = $row['correoEncargadoFacturaElectronica_fac'];
        $this->telefonoOficina_fac = $row['telefonoOficina_fac'];
        $this->numeroReserva_fac = $row['numeroReserva_fac'];
        $this->creacion = $row['creacion'];
        $this->_hash = $row['_hash'];
    }
    // update the product
    function update(){

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                servicio = :servicio, 
            nombreDeContacto = :nombreDeContacto, 
            correoElectronico1 = :correoElectronico1, 
            correoElectronico2 = :correoElectronico2, 
            empresa = :empresa, 
            telefono = :telefono, 
            direccion = :direccion, 
            fecha = :fecha, 
            tipoUnidad1 = :tipoUnidad1, 
            espaciosRequeridos = :espaciosRequeridos, 
            tipoUnidad2 = :tipoUnidad2, 
            descripcionDeMercancia = :descripcionDeMercancia, 
            razonSocial_fac = :razonSocial_fac, 
            cedulaJuridicaOFisica_fac = :cedulaJuridicaOFisica_fac, 
            nombreRepresentanteLegal_fac = :nombreRepresentanteLegal_fac, 
            cedulaRepresentanteLegal_fac = :cedulaRepresentanteLegal_fac, 
            provincia_fac = :provincia_fac, 
            canton_fac = :canton_fac, 
            distrito_fac = :distrito_fac, 
            barrio_fac = :barrio_fac, 
            direccion_fac = :direccion_fac, 
            correoEncargadoFacturaElectronica_fac = :correoEncargadoFacturaElectronica_fac, 
            telefonoOficina_fac = :telefonoOficina_fac, 
            numeroReserva_fac = :numeroReserva_fac, 
            creacion = :creacion,
            _hash = :_hash
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->servicio=htmlspecialchars(strip_tags($this->servicio));
        $this->nombreDeContacto=htmlspecialchars(strip_tags($this->nombreDeContacto));
        $this->correoElectronico1=htmlspecialchars(strip_tags($this->correoElectronico1));
        $this->correoElectronico2=htmlspecialchars(strip_tags($this->correoElectronico2));
        $this->empresa=htmlspecialchars(strip_tags($this->empresa));
        $this->telefono=htmlspecialchars(strip_tags($this->telefono));
        $this->direccion=htmlspecialchars(strip_tags($this->direccion));
        $this->fecha=htmlspecialchars(strip_tags($this->fecha));
        $this->tipoUnidad1=htmlspecialchars(strip_tags($this->tipoUnidad1));
        $this->espaciosRequeridos=htmlspecialchars(strip_tags($this->espaciosRequeridos));
        $this->tipoUnidad2=htmlspecialchars(strip_tags($this->tipoUnidad2));
        $this->descripcionDeMercancia=htmlspecialchars(strip_tags($this->descripcionDeMercancia));
        $this->razonSocial_fac=htmlspecialchars(strip_tags($this->razonSocial_fac));
        $this->cedulaJuridicaOFisica_fac=htmlspecialchars(strip_tags($this->cedulaJuridicaOFisica_fac));
        $this->nombreRepresentanteLegal_fac=htmlspecialchars(strip_tags($this->nombreRepresentanteLegal_fac));
        $this->cedulaRepresentanteLegal_fac=htmlspecialchars(strip_tags($this->cedulaRepresentanteLegal_fac));
        $this->provincia_fac=htmlspecialchars(strip_tags($this->provincia_fac));
        $this->canton_fac=htmlspecialchars(strip_tags($this->canton_fac));
        $this->distrito_fac=htmlspecialchars(strip_tags($this->distrito_fac));
        $this->barrio_fac=htmlspecialchars(strip_tags($this->barrio_fac));
        $this->direccion_fac=htmlspecialchars(strip_tags($this->direccion_fac));
        $this->correoEncargadoFacturaElectronica_fac=htmlspecialchars(strip_tags($this->correoEncargadoFacturaElectronica_fac));
        $this->telefonoOficina_fac=htmlspecialchars(strip_tags($this->telefonoOficina_fac));
        $this->numeroReserva_fac=htmlspecialchars(strip_tags($this->numeroReserva_fac));

        // bind new values
        $stmt->bindParam(1,$this->servicio);
        $stmt->bindParam(2,$this->nombreDeContacto);
        $stmt->bindParam(3,$this->correoElectronico1);
        $stmt->bindParam(4,$this->correoElectronico2);
        $stmt->bindParam(5,$this->empresa);
        $stmt->bindParam(6,$this->telefono);
        $stmt->bindParam(7,$this->direccion);
        $stmt->bindParam(8,$this->fecha);
        $stmt->bindParam(9,$this->tipoUnidad1);
        $stmt->bindParam(10,$this->espaciosRequeridos);
        $stmt->bindParam(11,$this->tipoUnidad2);
        $stmt->bindParam(12,$this->descripcionDeMercancia);
        $stmt->bindParam(13,$this->razonSocial_fac);
        $stmt->bindParam(14,$this->cedulaJuridicaOFisica_fac);
        $stmt->bindParam(15,$this->nombreRepresentanteLegal_fac);
        $stmt->bindParam(16,$this->cedulaRepresentanteLegal_fac);
        $stmt->bindParam(17,$this->provincia_fac);
        $stmt->bindParam(18,$this->canton_fac);
        $stmt->bindParam(19,$this->distrito_fac);
        $stmt->bindParam(20,$this->barrio_fac);
        $stmt->bindParam(21,$this->direccion_fac);
        $stmt->bindParam(22,$this->correoEncargadoFacturaElectronica_fac);
        $stmt->bindParam(23,$this->telefonoOficina_fac);
        $stmt->bindParam(24,$this->numeroReserva_fac);
        $stmt->bindParam(25,$this->creacion);
        $stmt->bindParam(26,$this->_hash);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    // delete the product
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
    // search products
    function search($keywords){

        // select all query
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.name LIKE ? OR p.description LIKE ? OR c.name LIKE ?
            ORDER BY
                p.created DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){

        // select query
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY p.created DESC
            LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt;
    }
    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }
}
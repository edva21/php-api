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
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                servicio=:servicio,nombreDeContacto=:nombreDeContacto,
        correoElectronico1=:correoElectronico1,correoElectronico2=:correoElectronico2,empresa=:empresa,
        telefono=:telefono,direccion=:direccion,fecha=:fecha,ipoUnidad1=:ipoUnidad1,
        espaciosRequeridos=:espaciosRequeridos,tipoUnidad2=:tipoUnidad2,
        descripcionDeMercancia=:descripcionDeMercancia,razonSocial_fac=:razonSocial_fac,
        cedulaJuridicaOFisica_fac=:cedulaJuridicaOFisica_fac,
        nombreRepresentanteLegal_fac=:nombreRepresentanteLegal_fac,
        cedulaRepresentanteLegal_fac=:cedulaRepresentanteLegal_fac,provincia_fac=:provincia_fac,
        canton_fac=:canton_fac,distrito_fac=:distrito_fac,barrio_fac=:barrio_fac,
        direccion_fac=:direccion_fac,
        correoEncargadoFacturaElectronica_fac=:correoEncargadoFacturaElectronica_fac,
        telefonoOficina_fac=:telefonoOficina_fac,numeroReserva_fac=:numeroReserva_fac";

        // prepare query
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

        // bind values
        $stmt->bindParam(":servicio",$this->servicio);
        $stmt->bindParam(":nombreDeContacto",$this->nombreDeContacto);
        $stmt->bindParam(":correoElectronico1",$this->correoElectronico1);
        $stmt->bindParam(":correoElectronico2",$this->correoElectronico2);
        $stmt->bindParam(":empresa",$this->empresa);
        $stmt->bindParam(":telefono",$this->telefono);
        $stmt->bindParam(":direccion",$this->direccion);
        $stmt->bindParam(":fecha",$this->fecha);
        $stmt->bindParam(":tipoUnidad1",$this->tipoUnidad1);
        $stmt->bindParam(":espaciosRequeridos",$this->espaciosRequeridos);
        $stmt->bindParam(":tipoUnidad2",$this->tipoUnidad2);
        $stmt->bindParam(":descripcionDeMercancia",$this->descripcionDeMercancia);
        $stmt->bindParam(":razonSocial_fac",$this->razonSocial_fac);
        $stmt->bindParam(":cedulaJuridicaOFisica_fac",$this->cedulaJuridicaOFisica_fac);
        $stmt->bindParam(":nombreRepresentanteLegal_fac",$this->nombreRepresentanteLegal_fac);
        $stmt->bindParam(":cedulaRepresentanteLegal_fac",$this->cedulaRepresentanteLegal_fac);
        $stmt->bindParam(":provincia_fac",$this->provincia_fac);
        $stmt->bindParam(":canton_fac",$this->canton_fac);
        $stmt->bindParam(":distrito_fac",$this->distrito_fac);
        $stmt->bindParam(":barrio_fac",$this->barrio_fac);
        $stmt->bindParam(":direccion_fac",$this->distrito_fac);
        $stmt->bindParam(":correoEncargadoFacturaElectronica_fac",$this->correoEncargadoFacturaElectronica_fac);
        $stmt->bindParam(":telefonoOficina_fac",$this->telefonoOficina_fac);
        $stmt->bindParam(":numeroReserva_fac",$this->numeroReserva_fac);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
    // used when filling up the update product form
    function readOne(){

        // query to read single record
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }
    // update the product
    function update(){

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                price = :price,
                description = :description,
                category_id = :category_id
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

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
DROP DATABASE desabookingdb;
DROP USER desabUsr;
CREATE DATABASE desabookingdb;
CREATE USER desabUsr IDENTIFIED BY 'desabRoot';
GRANT ALL PRIVILEGES ON desabookingdb.* to desabUsr@localhost;
USE desabookingdb;

CREATE TABLE `item` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `servicio` VARCHAR,
  `nombreDeContacto` VARCHAR,
  `correoElectronico1` VARCHAR,
  `correoElectronico2` VARCHAR,
  `empresa` VARCHAR,
  `telefono` VARCHAR,
  `direccion` TEXT,
  `fecha` DATETIME,
  `tipoUnidad1` VARCHAR,
  `espaciosRequeridos` INT,
  `tipoUnidad2` VARCHAR,
  `descripcionDeMercancia` VARCHAR,
  `razonSocial_fac` VARCHAR,
  `cedulaJuridicaOFisica_fac` VARCHAR,
  `nombreRepresentanteLegal_fac` VARCHAR,
  `cedulaRepresentanteLegal_fac` VARCHAR,
  `provincia_fac` VARCHAR,
  `canton_fac` VARCHAR,
  `distrito_fac` VARCHAR,
  `barrio_fac` VARCHAR,
  `direccion_fac` TEXT,
  `correoEncargadoFacturaElectronica_fac` VARCHAR,
  `telefonoOficina_fac` VARCHAR,
  `numeroReserva_fac` VARCHAR,
  `creacion` TIMESTAMP NOT NULL ,
  `_hash`   VARBINARY(32),
  CONSTRAINT PKusuario PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO item(id, servicio, nombreDeContacto, correoElectronico1, correoElectronico2, empresa, telefono, direccion,
                 fecha, tipoUnidad1, espaciosRequeridos, tipoUnidad2, descripcionDeMercancia, razonSocial_fac,
                 cedulaJuridicaOFisica_fac, nombreRepresentanteLegal_fac, cedulaRepresentanteLegal_fac, provincia_fac,
                 canton_fac, distrito_fac, barrio_fac, direccion_fac, correoEncargadoFacturaElectronica_fac,
                 telefonoOficina_fac, numeroReserva_fac, creacion) VALUES (1,"serviciotest1","nombreDeContactotest1",
                  "correoElectronico1test1","correoElectronico2test1","empresatest1","telefonotest1","direcciontest1",
                  current_date,"tipoUnidad1test1",0,"tipoUnidad2test1","descripcionDeMercanciatest1","razonSocial_factest1","
                 cedulaJuridicaOFisica_factest1","nombreRepresentanteLegal_factest1","cedulaRepresentanteLegal_factest1","provincia_factest1","
                 canton_factest1","distrito_factest1","barrio_factest1","direccion_factest1","correoEncargadoFacturaElectronica_factest1","
                 telefonoOficina_factest1","numeroReserva_factest1",CURRENT_TIMESTAMP);
DROP DATABASE desabookingdb;
DROP USER desabUsr;
CREATE DATABASE desabookingdb;
CREATE USER desabUsr IDENTIFIED BY 'desabRoot';
GRANT ALL PRIVILEGES ON desabookingdb.* to desabUsr@localhost;
USE desabookingdb;

CREATE TABLE `usuario` (
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
  `hash`   VARBINARY(32),
  CONSTRAINT PKusuario PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

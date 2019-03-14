DROP DATABASE desabookingdb;
DROP USER desabUsr;
CREATE DATABASE desabookingdb;
CREATE USER desabUsr IDENTIFIED BY 'desabRoot';
GRANT ALL PRIVILEGES ON desabookingdb.* to desabUsr;
USE desabookingdb;

CREATE TABLE `item` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `servicio` VARCHAR(250),
  `nombreDeContacto` VARCHAR(200),
  `correoElectronico1` VARCHAR(50),
  `correoElectronico2` VARCHAR(50),
  `empresa` VARCHAR(200),
  `telefono` VARCHAR(30),
  `direccion` TEXT,
  `fecha` DATETIME,
  `tipoUnidad1` VARCHAR(100),
  `espaciosRequeridos` INT,
  `tipoUnidad2` VARCHAR(100),
  `descripcionDeMercancia` VARCHAR(250),
  `razonSocial_fac` VARCHAR(100),
  `cedulaJuridicaOFisica_fac` VARCHAR(100),
  `nombreRepresentanteLegal_fac` VARCHAR(100),
  `cedulaRepresentanteLegal_fac` VARCHAR(100),
  `provincia_fac` VARCHAR(70),
  `canton_fac` VARCHAR(70),
  `distrito_fac` VARCHAR(70),
  `barrio_fac` VARCHAR(70),
  `direccion_fac` TEXT,
  `correoEncargadoFacturaElectronica_fac` VARCHAR(50),
  `telefonoOficina_fac` VARCHAR(40),
  `numeroReserva_fac` VARCHAR(50),
  `creacion` TIMESTAMP NOT NULL ,
  `_hash`   VARBINARY(32),
  CONSTRAINT PKitemPRIMARY PRIMARY KEY(id)
);

INSERT INTO item(id, servicio, nombreDeContacto, correoElectronico1, correoElectronico2, empresa, telefono, direccion,
                 fecha, tipoUnidad1, espaciosRequeridos, tipoUnidad2, descripcionDeMercancia, razonSocial_fac,
                 cedulaJuridicaOFisica_fac, nombreRepresentanteLegal_fac, cedulaRepresentanteLegal_fac, provincia_fac,
                 canton_fac, distrito_fac, barrio_fac, direccion_fac, correoEncargadoFacturaElectronica_fac,
                 telefonoOficina_fac, numeroReserva_fac, creacion,_hash) VALUES (1,"serviciotest1","nombreDeContactotest1",
                  "correoElectronico1test1","correoElectronico2test1","empresatest1","telefonotest1","direcciontest1",
                  current_date,"tipoUnidad1test1",0,"tipoUnidad2test1","descripcionDeMercanciatest1","razonSocial_factest1","
                 cedulaJuridicaOFisica_factest1","nombreRepresentanteLegal_factest1","cedulaRepresentanteLegal_factest1","provincia_factest1","
                 canton_factest1","distrito_factest1","barrio_factest1","direccion_factest1","correoEncargadoFacturaElectronica_factest1","
                 telOf_factest1","numeroReserva_factest1",CURRENT_TIMESTAMP,MD5("1")),(2,"serviciotest2","nombreDeContactotest2",
                "correoElectronico1test2","correoElectronico2test2","empresatest2","telefonotest2","direcciontest2",
                current_date,"tipoUnidad1test2",0,"tipoUnidad2test2","descripcionDeMercanciatest2","razonSocial_factest2","
                 cedulaJuridicaOFisica_factest2","nombreRepresentanteLegal_factest2","cedulaRepresentanteLegal_factest2","provincia_factest2","
                 canton_factest2","distrito_factest2","barrio_factest2","direccion_factest2","correoEncargadoFacturaElectronica_factest2","
                 telOf_factest2","numeroReserva_factest2",CURRENT_TIMESTAMP,MD5("2")),(3,"serviciotest3","nombreDeContactotest3",
                "correoElectronico1test3","correoElectronico2test3","empresatest3","telefonotest3","direcciontest3",
                current_date,"tipoUnidad1test3",0,"tipoUnidad2test3","descripcionDeMercanciatest3","razonSocial_factest3","
                 cedulaJuridicaOFisica_factest3","nombreRepresentanteLegal_factest3","cedulaRepresentanteLegal_factest3","provincia_factest3","
                 canton_factest3","distrito_factest3","barrio_factest3","direccion_factest3","correoEncargadoFacturaElectronica_factest3","
                 telOf_factest3","numeroReserva_factest3",CURRENT_TIMESTAMP,MD5("3")),(4,"serviciotest4","nombreDeContactotest4",
                "correoElectronico1test4","correoElectronico2test4","empresatest4","telefonotest4","direcciontest4",
                current_date,"tipoUnidad1test4",0,"tipoUnidad2test4","descripcionDeMercanciatest4","razonSocial_factest4","
                 cedulaJuridicaOFisica_factest4","nombreRepresentanteLegal_factest4","cedulaRepresentanteLegal_factest4","provincia_factest4","
                 canton_factest4","distrito_factest4","barrio_factest4","direccion_factest4","correoEncargadoFacturaElectronica_factest4","
                 telOf_factest4","numeroReserva_factest4",CURRENT_TIMESTAMP,MD5("4"));
DROP DATABASE desabookingdb;
DROP USER desabUsr;
CREATE DATABASE desabookingdb;
CREATE USER desabUsr IDENTIFIED BY 'desabRoot';
GRANT ALL PRIVILEGES ON desabookingdb.* to desabUsr@localhost;
USE desabookingdb;

CREATE TABLE `usuario` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `apellidos` VARCHAR(30) NOT NULL,
  `cedula` VARCHAR(30) NOT NULL,
  `creacion` TIMESTAMP NOT NULL ,
  `hash`   VARBINARY(32),
  CONSTRAINT PKusuario PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DELIMITER //
  CREATE PROCEDURE CREATEusuario(
  IN p_nombre VARCHAR(30),
  IN p_apellidos VARCHAR(30),
  IN p_cedula VARCHAR(30)
   )
   DETERMINISTIC
    BEGIN
        DECLARE creacion_now  TIMESTAMP(4);
        SET creacion_now = CURRENT_TIMESTAMP(4);
        INSERT INTO usuario(nombre,apellidos,cedula,creacion,hash)
        VALUES(
          p_nombre,p_apellidos,p_cedula,creacion_now,
              MD5(
                CONCAT(
                  '*',p_nombre,p_apellidos,p_cedula,creacion_now
                )
              )
            );
    END;//
DELIMITER ;

DELIMITER //
    CREATE PROCEDURE READusuario(IN p_id BIGINT)
    BEGIN
            SELECT nombre,apellidos,cedula,creacion,hash
              FROM usuario
            WHERE id=p_id;
    END;
    //
DELIMITER ;

DELIMITER //
    CREATE PROCEDURE READALLusuario()
    BEGIN
            SELECT nombre,apellidos,cedula,creacion,hash
            FROM usuario
            WHERE id=p_id;
    END;
    //
DELIMITER ;

DELIMITER //
    CREATE PROCEDURE UPDATEusuario(
      IN p_nombre VARCHAR(30),
      IN p_apellidos VARCHAR(30),
      IN p_cedula VARCHAR(30)
    )
    BEGIN
        DECLARE creacion_now  TIMESTAMP(4);
        SET creacion_now = CURRENT_TIMESTAMP(4);
            UPDATE usuario
            SET nombre =p_nombre,
             apellidos=p_apellidos,
             cedula=p_cedula,
             creacion=creacion_now,
             hash=MD5(CONCAT('*',p_nombre,p_apellidos,p_cedula,creacion_now));
    END;
    //
DELIMITER ;

DELIMITER //
    CREATE PROCEDURE DELETEusuario(IN p_id BIGINT)
    BEGIN
            DELETE FROM usuario WHERE id=p_id;
    END;
    //
DELIMITER ;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema wolmar
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema wolmar
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `wolmar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `wolmar` ;

-- -----------------------------------------------------
-- Table `wolmar`.`cargo_laboral`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`cargo_laboral` (
  `id_cargo` INT(11) NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(30) NULL,
  `descripcion_cargo` TEXT NULL DEFAULT NULL,
  `salario_mensual_cargo` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`id_cargo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`municipio` (
  `id_municipio` INT(11) NOT NULL,
  `nombre_municipio` VARCHAR(30) NULL,
  PRIMARY KEY (`id_municipio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`persona` (
  `cedula_pers` INT(11) NOT NULL,
  `primerNombre_pers` VARCHAR(20) NOT NULL,
  `segundoNombre_pers` VARCHAR(20) NULL DEFAULT NULL,
  `primerApellido_pers` VARCHAR(20) NOT NULL,
  `segundoApellido_pers` VARCHAR(20) NULL DEFAULT NULL,
  `sexo` VARCHAR(15) NULL DEFAULT NULL,
  `direccion_residencia_pers` TEXT NULL DEFAULT NULL,
  `id_municipio_residencia_pers` INT(11) NULL,
  PRIMARY KEY (`cedula_pers`),
  INDEX `fk_persona_municipio1_idx` (`id_municipio_residencia_pers` ASC) VISIBLE,
  CONSTRAINT `fk_persona_municipio1`
    FOREIGN KEY (`id_municipio_residencia_pers`)
    REFERENCES `wolmar`.`municipio` (`id_municipio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`cliente` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `cedula_pers1` INT(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  INDEX `cedula_pers1` (`cedula_pers1` ASC) VISIBLE,
  CONSTRAINT `cliente_ibfk_1`
    FOREIGN KEY (`cedula_pers1`)
    REFERENCES `wolmar`.`persona` (`cedula_pers`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`departamento_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`departamento_producto` (
  `id_departamento` INT(11) NOT NULL,
  `departamento` VARCHAR(30) NULL,
  PRIMARY KEY (`id_departamento`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`sucursal` (
  `id_sucursal` INT(11) NOT NULL,
  `nombre_sucursal` VARCHAR(50) NOT NULL,
  `id_municipio1` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_sucursal`),
  INDEX `id_municipio1` (`id_municipio1` ASC) VISIBLE,
  CONSTRAINT `sucursal_ibfk_1`
    FOREIGN KEY (`id_municipio1`)
    REFERENCES `wolmar`.`municipio` (`id_municipio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`empleado` (
  `id_empleado` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_contratacion_empleado` DATE NOT NULL,
  `horas_laborables_mensuales_empleado` INT(11) NULL DEFAULT NULL,
  `cedula_pers1` INT(11) NOT NULL,
  `id_cargo_empleado` INT(11) NULL,
  `id_sucursal_empleado` INT(11) NULL,
  PRIMARY KEY (`id_empleado`),
  INDEX `cedula_pers1` (`cedula_pers1` ASC) VISIBLE,
  INDEX `id_cargo_empleado` (`id_cargo_empleado` ASC) VISIBLE,
  INDEX `fk_empleado_sucursal1_idx` (`id_sucursal_empleado` ASC) VISIBLE,
  CONSTRAINT `empleado_ibfk_1`
    FOREIGN KEY (`cedula_pers1`)
    REFERENCES `wolmar`.`persona` (`cedula_pers`),
  CONSTRAINT `empleado_ibfk_2`
    FOREIGN KEY (`id_cargo_empleado`)
    REFERENCES `wolmar`.`cargo_laboral` (`id_cargo`),
  CONSTRAINT `fk_empleado_sucursal1`
    FOREIGN KEY (`id_sucursal_empleado`)
    REFERENCES `wolmar`.`sucursal` (`id_sucursal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`factura` (
  `id_factura` INT(11) NOT NULL,
  `fecha_factura` DATE NOT NULL,
  `id_sucursal_factura` INT(11) NULL DEFAULT NULL,
  `id_cliente_factura` INT(11) NULL DEFAULT NULL,
  `id_empleado_factura` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  INDEX `id_cliente_factura` (`id_cliente_factura` ASC) VISIBLE,
  INDEX `id_empleado_factura` (`id_empleado_factura` ASC) VISIBLE,
  INDEX `factura_ibfk_1_idx` (`id_sucursal_factura` ASC) VISIBLE,
  CONSTRAINT `factura_ibfk_1`
    FOREIGN KEY (`id_sucursal_factura`)
    REFERENCES `wolmar`.`sucursal` (`id_sucursal`),
  CONSTRAINT `factura_ibfk_2`
    FOREIGN KEY (`id_cliente_factura`)
    REFERENCES `wolmar`.`cliente` (`id_cliente`),
  CONSTRAINT `factura_ibfk_3`
    FOREIGN KEY (`id_empleado_factura`)
    REFERENCES `wolmar`.`empleado` (`id_empleado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`tipo_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`tipo_producto` (
  `id_tipo_producto` INT(11) NOT NULL,
  `nombre_tipo_producto` VARCHAR(20) NULL,
  `descripcion_tipo_producto` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_producto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`producto` (
  `cod_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` VARCHAR(40) NOT NULL,
  `fecha_elaboracion_producto` DATE NULL DEFAULT NULL,
  `fecha_caducidad_producto` DATE NULL DEFAULT NULL,
  `precio_producto` FLOAT NOT NULL,
  `cantidad_producto` INT(11) NULL,
  `descripcion_producto` TEXT NULL DEFAULT NULL,
  `id_sucursal_producto` INT(11) NULL DEFAULT NULL,
  `id_departamento_producto1` INT(11) NULL DEFAULT NULL,
  `id_tipo_producto1` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_producto`),
  INDEX `id_departamento_producto1` (`id_departamento_producto1` ASC) VISIBLE,
  INDEX `id_tipo_producto1` (`id_tipo_producto1` ASC) VISIBLE,
  INDEX `producto_ibfk_1_idx` (`id_sucursal_producto` ASC) VISIBLE,
  CONSTRAINT `producto_ibfk_1`
    FOREIGN KEY (`id_sucursal_producto`)
    REFERENCES `wolmar`.`sucursal` (`id_sucursal`),
  CONSTRAINT `producto_ibfk_2`
    FOREIGN KEY (`id_departamento_producto1`)
    REFERENCES `wolmar`.`departamento_producto` (`id_departamento`),
  CONSTRAINT `producto_ibfk_3`
    FOREIGN KEY (`id_tipo_producto1`)
    REFERENCES `wolmar`.`tipo_producto` (`id_tipo_producto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`factura_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`factura_producto` (
  `id_factura1` INT(11) NOT NULL DEFAULT NULL,
  `cod_producto1` INT(11) NOT NULL DEFAULT NULL,
  INDEX `id_factura1` (`id_factura1` ASC) VISIBLE,
  INDEX `cod_producto1` (`cod_producto1` ASC) VISIBLE,
  PRIMARY KEY (`cod_producto1`, `id_factura1`),
  CONSTRAINT `factura_producto_ibfk_1`
    FOREIGN KEY (`id_factura1`)
    REFERENCES `wolmar`.`factura` (`id_factura`),
  CONSTRAINT `factura_producto_ibfk_2`
    FOREIGN KEY (`cod_producto1`)
    REFERENCES `wolmar`.`producto` (`cod_producto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`proveedor` (
  `id_proveedor` INT(11) NOT NULL,
  `nombre_proveedor` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`producto_proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`producto_proveedor` (
  `cod_producto1` INT(11) NOT NULL DEFAULT NULL,
  `id_proveedor1` INT(11) NOT NULL,
  INDEX `cod_producto1` (`cod_producto1` ASC) VISIBLE,
  INDEX `id_proveedor1` (`id_proveedor1` ASC) VISIBLE,
  PRIMARY KEY (`cod_producto1`, `id_proveedor1`),
  CONSTRAINT `producto_proveedor_ibfk_1`
    FOREIGN KEY (`cod_producto1`)
    REFERENCES `wolmar`.`producto` (`cod_producto`)
    ON UPDATE RESTRICT,
  CONSTRAINT `producto_proveedor_ibfk_2`
    FOREIGN KEY (`id_proveedor1`)
    REFERENCES `wolmar`.`proveedor` (`id_proveedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`tipo_telefono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`tipo_telefono` (
  `id_tipo_tfno` INT(11) NOT NULL,
  `tipo_telefono` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_tfno`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `wolmar`.`telefono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wolmar`.`telefono` (
  `id_tfno` INT(11) NOT NULL AUTO_INCREMENT,
  `telefono` VARCHAR(20) NULL,
  `cedula_pers2` INT(11) NULL,
  `tipo_telefono_id_tipo_tfno` INT(11) NULL,
  PRIMARY KEY (`id_tfno`),
  INDEX `cedula_pers2` (`cedula_pers2` ASC) VISIBLE,
  INDEX `fk_telefono_tipo_telefono1_idx` (`tipo_telefono_id_tipo_tfno` ASC) VISIBLE,
  CONSTRAINT `telefono_ibfk_1`
    FOREIGN KEY (`cedula_pers2`)
    REFERENCES `wolmar`.`persona` (`cedula_pers`),
  CONSTRAINT `fk_telefono_tipo_telefono1`
    FOREIGN KEY (`tipo_telefono_id_tipo_tfno`)
    REFERENCES `wolmar`.`tipo_telefono` (`id_tipo_tfno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

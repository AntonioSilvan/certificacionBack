DROP DATABASE IF EXISTS certificacion;
CREATE DATABASE IF NOT EXISTS certificacion CHARACTER SET utf8 COLLATE utf8_general_ci;

USE certificacion;

CREATE TABLE Users(
	use_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	use_nombre VARCHAR(100),
	use_ap_paterno VARCHAR(60),
	use_ap_materno VARCHAR(60),
	use_curp VARCHAR(25),
	use_rfc VARCHAR(20),
	use_correo VARCHAR(100),
	use_password VARCHAR(100),
	use_status TINYINT DEFAULT 1,
	use_pais  VARCHAR(50),
	use_estado VARCHAR(50),
	use_municipio VARCHAR(50),
	use_colonia VARCHAR(50),
	use_calle VARCHAR(50),
	use_numero VARCHAR(10)
);

CREATE TABLE Administradores(
	adm_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	adm_nombre VARCHAR(100),
	adm_ap_paterno VARCHAR(60),
	adm_ap_materno VARCHAR(60),
	adm_correo VARCHAR(100),
	adm_password VARCHAR(100),
	adm_status TINYINT DEFAULT 1
);

CREATE TABLE Preguntas(
	pre_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	pre_contenido TEXT,
	pre_fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	pre_status TINYINT DEFAULT 1,
	fk_adm_id INT NOT NULL,
	FOREIGN KEY (fk_adm_id) REFERENCES Administradores(adm_id)
);

CREATE TABLE Respuestas(
	res_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	res_contenido TEXT,
	res_correcta TINYINT,
	res_fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	res_status TINYINT DEFAULT 1,
	fk_pre_id INT NOT NULL,
	fk_adm_id INT NOT NULL,
	FOREIGN KEY (fk_pre_id) REFERENCES Preguntas(pre_id),
	FOREIGN KEY (fk_adm_id) REFERENCES Administradores(adm_id)
);

CREATE TABLE Ficha(
	fic_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fic_ruta TEXT,
	fic_fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	fic_status TINYINT DEFAULT 1,
	fk_use_id INT NOT NULL,
	FOREIGN KEY (fk_use_id) REFERENCES Users(use_id)
);
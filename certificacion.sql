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
	use_password VARCHAR(100)
);

CREATE TABLE Domicilio(
	dom_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	dom_calle VARCHAR(50),
	dom_numero VARCHAR(10),
	dom_colonia VARCHAR(50),
	dom_municipio VARCHAR(50),
	dom_estado VARCHAR(50),
	dom_pais VARCHAR(50),
	fk_use_id INT NOT NULL,
	FOREIGN KEY (fk_use_id) REFERENCES Users(use_id)
);

CREATE TABLE Administradores(
	adm_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	adm_nombre VARCHAR(100),
	adm_ap_paterno VARCHAR(60),
	adm_ap_materno VARCHAR(60),
	adm_correo VARCHAR(100),
	adm_password VARCHAR(100)
);

CREATE TABLE Preguntas(
	pre_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	pre_contenido TEXT,
	pre_year TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Respuestas(
	res_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	res_contenido TEXT,
	res_correcta BOOL,
	fk_pre_id INT NOT NULL,
	fk_adm_id INT NOT NULL,
	FOREIGN KEY (fk_pre_id) REFERENCES Preguntas(pre_id),
	FOREIGN KEY (fk_adm_id) REFERENCES Administradores(adm_id)
);
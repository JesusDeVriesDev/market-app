CREATE TABLE users(
	id BIGSERIAL PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	mobile_number VARCHAR(20) NOT NULL,
	ide_number VARCHAR(15) NULL UNIQUE,
	adress TEXT NULL,
	birthdate DATE NULL,
	email VARCHAR(200) NOT NULL UNIQUE,
	password TEXT NOT NULL,
	id_city_birthday BIGINT REFERENCES cities(id),
    id_city_document BIGINT REFERENCES cities(id),	
	status BOOLEAN NOT NULL DEFAULT TRUE,
	created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	delete_at TIMESTAMPTZ NULL
);

CREATE TABLE countries (
  	id BIGSERIAL PRIMARY KEY,
  	name VARCHAR(100) NOT NULL,
  	abbrev VARCHAR(10),
  	code VARCHAR(10),
  	status BOOLEAN NOT NULL DEFAULT TRUE,
	created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	delete_at TIMESTAMPTZ NULL
);

CREATE TABLE regions (
  	id BIGSERIAL PRIMARY KEY,
  	name VARCHAR(100) NOT NULL,
	abbrev VARCHAR(10),
	code VARCHAR(10),
  	country_id INT NOT NULL,
  	status BOOLEAN NOT NULL DEFAULT TRUE,
	created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	delete_at TIMESTAMPTZ NULL,
  	FOREIGN KEY (country_id) REFERENCES countries(id)
);

CREATE TABLE cities (
  	id BIGSERIAL PRIMARY KEY,
  	name VARCHAR(100) NOT NULL,
	abbrev VARCHAR(10),
	code VARCHAR(10),
  	region_id INT NOT NULL,
  	status BOOLEAN NOT NULL DEFAULT TRUE,
	created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	delete_at TIMESTAMPTZ NULL,
  	FOREIGN KEY (region_id) REFERENCES regions(id)
);

select * from users;

INSERT INTO countries (name, abbrev, code)
VALUES
('Colombia', 'CO', '+57'),
('México', 'MX', '+52'),
('Argentina', 'AR', '+54');

INSERT INTO regions (name, abbrev, code, country_id)
VALUES
-- Colombia
('Cundinamarca', 'CUN', 'CUN-01', 1),
('Antioquia', 'ANT', 'ANT-02', 1),

-- México
('Jalisco', 'JAL', 'JAL-01', 2),
('Ciudad de México', 'CDMX', 'CDMX-02', 2),

-- Argentina
('Buenos Aires', 'BA', 'BA-01', 3),
('Córdoba', 'COR', 'COR-02', 3);

INSERT INTO cities (name, abbrev, code, region_id)
VALUES
-- Cundinamarca
('Bogotá', 'BOG', 'BOG-01', 1),
('Soacha', 'SOA', 'SOA-02', 1),

-- Antioquia
('Medellín', 'MED', 'MED-01', 2),
('Bello', 'BEL', 'BEL-02', 2),

-- Jalisco
('Guadalajara', 'GDL', 'GDL-01', 3),
('Zapopan', 'ZAP', 'ZAP-02', 3),

-- Ciudad de México
('Ciudad de México', 'CDMX', 'CDMX-01', 4),

-- Buenos Aires
('Buenos Aires', 'BA', 'BA-01', 5),

-- Córdoba
('Córdoba', 'COR', 'COR-01', 6);

INSERT INTO users (
    firstname, lastname, mobile_number, ide_number, adress,
    birthdate, email, password, id_city_birthday, id_city_document
)
VALUES
('Carlos', 'Ramírez', '+573001112233', '123456789', 'Calle 123 #45-67, Bogotá',
 '1990-05-10', 'carlos.ramirez@example.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),

('María', 'Gómez', '+573004445566', '987654321', 'Carrera 10 #20-30, Medellín',
 '1988-09-22', 'maria.gomez@example.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 3),

('Juan', 'Pérez', '+525511223344', 'A12345678', 'Av. Insurgentes Sur 500, CDMX',
 '1995-03-15', 'juan.perez@example.com', 'e10adc3949ba59abbe56e057f20f883e', 7, 7),

('Lucía', 'Fernández', '+541123456789', 'DNI1234567', 'Av. Corrientes 1234, Buenos Aires',
 '1992-07-08', 'lucia.fernandez@example.com', 'e10adc3949ba59abbe56e057f20f883e', 9, 9),

('Andrés', 'López', '+573005556677', '1122334455', 'Cra 15 #45-60, Soacha',
 '2000-11-30', 'andres.lopez@example.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 1);

 alter table users add column photo varchar(30) null
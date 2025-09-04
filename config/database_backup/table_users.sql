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
	status BOOLEAN NOT NULL DEFAULT TRUE,
	created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	delete_at TIMESTAMPTZ NULL
);

INSERT INTO users(
	firstname,
	lastname,
	mobile_number,
	email,
	password
)
VALUES (
	'Jesus',
	'De Vries',
	'3024445935',
	'jddvies.4080@unicesmag.edu.co',
	'1234'
);

INSERT INTO users(
	firstname,
	lastname,
	mobile_number,
	email,
	password
)
VALUES (
	'Juan',
	'Perez',
	'3005053191',
	'juan.pejo.40@unicesmag.edu.co',
	'1234'
);

INSERT INTO users(
	firstname,
	lastname,
	mobile_number,
	email,
	password
)
VALUES (
	'Daniel',
	'Rojas',
	'3004053192',
	'dan.roja.80@unicesmag.edu.co',
	'1234'
);
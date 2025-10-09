CREATE DATABASE hotel_reservas;
    DEFAULT CHARACTER SET = 'utf8mb4';

use  hotel_reservas;

CREATE TABLE ROLES (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    status TINYINT(1) DEFAULT 1
);

CREATE TABLE TYPE_DOCUMENT (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE STATUS_PAYMENT (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    status TINYINT(1) DEFAULT 1
);

CREATE TABLE STATUS_ROOM (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE STATUS_RESERVATION (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE USERS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    num_document VARCHAR(50) NOT NULL,
    id_type_document INT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100),
    telefono VARCHAR(20),
    correo VARCHAR(150) UNIQUE,
    id_rol INT,
    status TINYINT(1) DEFAULT 1,
    contrasena VARCHAR(255),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_type_document) REFERENCES TYPE_DOCUMENT(id),
    FOREIGN KEY (id_rol) REFERENCES ROLES(id)
);

CREATE TABLE ROOM (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_type_room INT,
    descripcion TEXT,
    id_status_room INT,
    price DECIMAL(10,2),
    name VARCHAR(100),
    max_persons INT,
    FOREIGN KEY (id_status_room) REFERENCES STATUS_ROOM(id)
);

CREATE TABLE RESERVATION (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    id_room INT,
    date_reservation DATE,
    checkin DATE,
    checkout DATE,
    id_status_reservation INT,
    pay DECIMAL(10,2),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modify_users_sesion VARCHAR(255),
    specialrequest TEXT,
    FOREIGN KEY (id_user) REFERENCES USERS(id),
    FOREIGN KEY (id_room) REFERENCES ROOM(id),
    FOREIGN KEY (id_status_reservation) REFERENCES STATUS_RESERVATION(id)
);

CREATE TABLE PAYMENT_METHOD (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    status TINYINT(1) DEFAULT 1
);

CREATE TABLE PAYMENTS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_reservation INT,
    amount DECIMAL(10,2),
    id_payments_method INT,
    id_status_payment INT,
    reference VARCHAR(100),
    notes TEXT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_reservation) REFERENCES RESERVATION(id),
    FOREIGN KEY (id_payments_method) REFERENCES PAYMENT_METHOD(id),
    FOREIGN KEY (id_status_payment) REFERENCES STATUS_PAYMENT(id)
);

INSERT INTO type_document (nombre) VALUES
('Cedula de ciudadania'),
('Pasaporte'),
('Cedula de extranjeria');

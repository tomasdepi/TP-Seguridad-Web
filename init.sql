
CREATE DATABASE IF NOT EXISTS segu_web;

USE segu_web;

CREATE TABLE Users (
    id int not null,
    email varchar(100) not null,
    password varchar(32) not null
);

INSERT INTO Users (id, email, password) values (1, 'admin', 'seguridad-web');
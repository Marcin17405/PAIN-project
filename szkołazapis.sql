CREATE DATABASE szkola;

CREATE TABLE student(
    id int(50) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    surname VARCHAR(50),
);

CREATE TABLE class(
    id int(50) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
);

CREATE TABLE teacher(
    id int(50) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    surname VARCHAR(50),
    age int(50),
);

CREATE TABLE subject(
    id int(50) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
);

CREATE TABLE user(
    name VARCHAR(50) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    password VARCHAR(50) NOT NULL,
);
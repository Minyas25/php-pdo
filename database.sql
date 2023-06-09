-- Active: 1623772641700@@127.0.0.1@3306@php_pdo
DROP TABLE IF EXISTS product;

CREATE TABLE product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    description TEXT
);

INSERT INTO product (label, price, description) VALUES 
('Toothbrush', 4.2, 'Beautiful, full of hair, in its lane, flourishing'),
('Dog food', 10.99, 'Chow chow woof woof'),
('The book', 5, 'Very smart'),
('Ice cream', 3.4, 'Vanilla ice cream');

DROP TABLE IF EXISTS book;

CREATE TABLE book (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    year INT,
    author VARCHAR(255)
);

INSERT INTO book (title,year,author) VALUES 
('Snow Crash', 2011, 'Neal Stephenson'),
('The patternist', 1990, 'Octavia E Buttler'),
('The disposessed', 1987, 'Ursula K LeGuin'),
('LOTR', 1945, 'Tolkien');
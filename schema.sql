CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE Barista (
    barista_id INT PRIMARY KEY AUTO_INCREMENT,
    barista_name VARCHAR(50) NOT NULL,
    experience_level VARCHAR(20),
    contact_number VARCHAR(15)
);

CREATE TABLE Product (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(50) NOT NULL,
    price DECIMAL(5,2) NOT NULL,
    barista_id INT,
    FOREIGN KEY (barista_id) REFERENCES Barista(barista_id)
);

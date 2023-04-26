CREATE DATABASE klmpk_2_db_laundry;

USE klmpk_2_db_laundry;

CREATE TABLE `customers` (
    `id` int(11) NOT NULL auto_increment,
    `nama` varchar(100) NOT NULL,
    `telepon` varchar(12) NOT NULL,
    `berat` int(2) NOT NULL,
    `tipe` varchar(15) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`)
);

CREATE TABLE `users` (
    `id` int(11) NOT NULL auto_increment,
    `username` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `nama` varchar(100) NOT NULL,
    `telepon` varchar(12) NOT NULL,
    `alamat` varchar(255) NOT NULL,
    `kelamin` varchar(10) NOT NULL,
    `tipe` varchar(8) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`),
    UNIQUE KEY `username` (`username`)
);

INSERT INTO `users` (`username`, `password`, `nama`, `telepon`, `alamat`, `kelamin`, `tipe`)
VALUES ('admin', MD5('password'), 'Admin', '000000000000', 'Jalan Buntu', 'Khusus', 'admin');
-- ============================================================
-- Database: dbstudents
-- Project:  Student Management System
-- ============================================================

DROP DATABASE IF EXISTS `dbstudents`;
CREATE DATABASE `dbstudents`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE `dbstudents`;

CREATE TABLE `students` (
    `id`             int(11)       NOT NULL AUTO_INCREMENT,
    `name`           varchar(100)  NOT NULL,
    `surname`        varchar(100)  NOT NULL,
    `middlename`     varchar(100)  DEFAULT NULL,
    `address`        text          DEFAULT NULL,
    `contact_number` varchar(20)   DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

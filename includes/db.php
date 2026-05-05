<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'dbstudents';

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

$conn->select_db($dbname);

$tableQuery = "CREATE TABLE IF NOT EXISTS `students` (
    `id`             int(11)       NOT NULL AUTO_INCREMENT,
    `name`           varchar(100)  NOT NULL,
    `surname`        varchar(100)  NOT NULL,
    `middlename`     varchar(100)  DEFAULT NULL,
    `address`        text          DEFAULT NULL,
    `contact_number` varchar(20)   DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$conn->query($tableQuery);
?>

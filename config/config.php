<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'web-servidor');
define('DB_USER', 'root');
define('DB_PASS', '');

// Conexão com o banco de dados
function getConnection() {
    try {
        return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
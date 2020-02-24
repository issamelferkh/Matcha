<?php
    include_once 'database.php';
    try {
        $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
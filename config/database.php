<?php
    $DB_DSN = 'mysql:dbname=matcha_mm;host=127.0.0.1';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_NAME = 'matcha';
    $DB_HOST = '127.0.0.1';

    $host = $_SERVER['HTTP_HOST'];
    $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
    $url = "$protocol://$host/matcha";
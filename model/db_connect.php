<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'dev_ryan');
define('DB_PASSWORD', 'healthcare');
define('DB_NAME', 'healthcare-system');

    try {
        $db = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("ERROR. Could not connect to database: " . $e->getMessage());
    }
?>
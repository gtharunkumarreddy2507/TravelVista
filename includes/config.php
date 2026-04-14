<?php
// includes/config.php
// Reads connection parameters from environment variables.
// Set these in Render → Environment (see ENV.md for details).

$DB_HOST = preg_replace('/[^a-zA-Z0-9.\-]/', '', getenv('DB_HOST') ?: 'localhost');
$DB_PORT = (int)(getenv('DB_PORT') ?: 3306);
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') ?: '';
$DB_NAME = preg_replace('/[^a-zA-Z0-9_\-]/', '', getenv('DB_NAME') ?: 'travel');

if ($DB_PORT < 1 || $DB_PORT > 65535) {
    $DB_PORT = 3306;
}

try {
    $dbh = new PDO(
        "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};charset=utf8",
        $DB_USER,
        $DB_PASS,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
    );
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    exit("Database connection failed. Please check server configuration.");
}

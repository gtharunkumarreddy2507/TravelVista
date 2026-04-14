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

// MySQLi connection — available as $conn throughout the application.
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    exit("Database connection failed. Please check server configuration.");
}
mysqli_set_charset($conn, 'utf8mb4');

// PDO connection — retained for backward compatibility with existing prepared statements.
// Uses charset in the DSN; PDO::MYSQL_ATTR_INIT_COMMAND is intentionally omitted.
try {
    $dbh = new PDO(
        "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};charset=utf8mb4",
        $DB_USER,
        $DB_PASS
    );
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    exit("Database connection failed. Please check server configuration.");
}

<?php
// DB credentials — read from environment variables (Render) with local-dev defaults.
$db_host = getenv('DB_HOST') !== false ? getenv('DB_HOST') : 'localhost';
$db_port = getenv('DB_PORT') !== false ? getenv('DB_PORT') : '3306';
$db_user = getenv('DB_USER') !== false ? getenv('DB_USER') : 'root';
$db_pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$db_name = getenv('DB_NAME') !== false ? getenv('DB_NAME') : 'travel';

// Establish database connection.
try {
    $dbh = new PDO(
        "mysql:host={$db_host};port={$db_port};dbname={$db_name}",
        $db_user,
        $db_pass,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
    );
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>

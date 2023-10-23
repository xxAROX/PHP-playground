<?php
namespace xxAROX\Playground;
use xxAROX\Playground\database\Database;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/vendor/autoload.php";

$db = new Database();
global $db;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Playground</title>
    <link href="./assets/css/main.css" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once __DIR__ ."/views/components/navbar.php"; ?>
    <main>
        <?php include_once __DIR__ ."/views/components/carousel.php"; ?>
    </main>

    <script src="./assets/javascript/main.js"></script>
    <script src="./assets/javascript/bootstrap.bundle.min.js"></script>
</body>
</html>

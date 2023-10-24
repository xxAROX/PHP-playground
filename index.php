<?php
namespace xxAROX\Playground;
use xxAROX\Playground\database\Database;

require_once __DIR__ . "/vendor/autoload.php";

$db = new Database();
global $db;

if (session_status() == PHP_SESSION_NONE) session_start();

$user_id = $_SESSION["user_id"] ?? null;
$user = $db->users[$user_id] ?? null;
$method = mb_strtolower($_GET["action"] ?? "");


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
    <?php
    if (isset($_SESSION["error"])) {
        echo "[ERROR]: ". $_SESSION["error"];
        unset($_SESSION["error"]);
    }
    if (isset($_SESSION["success"])) { 
        echo "[SUCCESS]: ". $_SESSION["success"];
        unset($_SESSION["success"]);
    }
    include_once __DIR__ ."/views/components/navbar.php"; ?>

    <?php
    switch (true) {
        case $method === "register":
            include_once __DIR__ ."/views/sites/register.php";
            break;
        case $method === "login" || is_null($user):
            include_once __DIR__ ."/views/sites/login.php";
            break;
        case $method === "logout" && !is_null($user):
            session_destroy();
            header("Location: /?action=login");
            break;
        
        default:
            // IGNORE
            break;
    }
    ?>

    <script src="./assets/javascript/main.js"></script>
    <script src="./assets/javascript/bootstrap.bundle.min.js"></script>
</body>
</html>

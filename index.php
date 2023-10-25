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
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script src="./assets/javascript/utils.js"></script>
    <?php
    if (isset($_SESSION["error"])) { ?>
        <script>showToast({text: `<?= $_SESSION["error"] ?>`, icon: TOAST_ICONS["Error"]})</script>
    <?php unset($_SESSION["error"]);
    }
    if (isset($_SESSION["success"])) { ?>
        <script>showToast({text: `<?= $_SESSION["success"] ?>`, icon: TOAST_ICONS["Success"]})</script>
    <?php unset($_SESSION["success"]);
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
            session_start();
            $_SESSION["success"] = "Successfully logged out!";
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

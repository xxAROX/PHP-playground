<?php
namespace xxAROX\Playground;
use xxAROX\Playground\database\Database;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/vendor/autoload.php";


var_dump(class_exists(Database::class));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Playground</title>
</head>
<body>
    Hello world!
</body>
</html>

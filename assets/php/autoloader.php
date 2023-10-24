<?php
use xxAROX\Playground\database\Database;

include_once dirname(__DIR__, 2) ."/vendor/autoload.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() == PHP_SESSION_NONE) session_start();


$database = new Database();


global $database;

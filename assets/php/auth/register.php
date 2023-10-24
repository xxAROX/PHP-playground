<?php
include_once dirname(__DIR__) ."/autoloader.php";

$email = $_POST["email"] ?? "";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Content-Type: application/json");
    echo(json_encode([
        "error"=> "Input is not an email",
    ]));
    return;
}
$password = $_POST["password"] ?? "";


$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
    header("Content-Type: application/json");
    echo(json_encode([
        "error"=> "Password should be at least 8 characters in length and should include at least one upper case letter, one number.",
    ]));
    return;
}

if ($database->isUserRegistered($email)) {
    header("Content-Type: application/json");
    echo(json_encode([
        "error"=> "Email is already taken.",
    ]));
    return;
}
$user = $database->createUser($email, $password);
$_SESSION["user"] = $user->getId();
header("Location: /");

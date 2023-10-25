<?php
include_once dirname(__DIR__) ."/autoloader.php";

$email = $_POST["email"] ?? "";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["error"] = "Email is not valid!";
    header("Location: /?action=login");
    return;
}
if (!$database->isUserRegistered($email)) {
    $_SESSION["error"] = "Email or password is wrong or not found!";
    header("Location: /?action=login");
    return;
}

$password = $_POST["current-password"] ?? "";
if (md5($password) !== $database->getUserByEmail($email)?->getHashedPassword()) {
    $_SESSION["error"] = "Email or password is wrong or not found!";
    header("Location: /?action=login");
    return;
}
$user = $database->getUserByEmail($email);

$_SESSION["user_id"] = $user->getId();
$_SESSION["success"] = "Successfully logged in!";
header("Location: /");

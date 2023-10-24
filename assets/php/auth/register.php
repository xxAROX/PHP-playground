<?php
include_once dirname(__DIR__) ."/autoloader.php";

$email = $_POST["email"] ?? "";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["error"] = "Email is not valid!";
    header("Location: /?action=register");
    return;
}
$password = $_POST["password"] ?? "";


$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
    $_SESSION["error"] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number.";
    header("Location: /?action=register");
    return;
}

if ($database->isUserRegistered($email)) {
    $_SESSION["error"] = "Email is already taken.";
    header("Location: /?action=register");
    return;
}
$user = $database->createUser($email, $password);
$_SESSION["user_id"] = $user->getId();
$_SESSION["success"] = "Successfully registered!";
header("Location: /");

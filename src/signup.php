<?php
require_once(dirname(__FILE__) ."/../functions/utility.php");
require_once(dirname(__FILE__) ."/user.php");
function fetch_user(array $user) : user {
    return new user ($user["name"], $user["lastname"], $user["email"], $user["password"], $user["yob"], $user["hobby"]);
}
function register_user(mysqli $conn, user $user) : string {
    if (check_if_user_present($conn, $user->email))
        return "User with email already present. Try to <a href='signin.php'>login</a>.";
    $hash = md5($user->password);
    $sql = "INSERT INTO users (name, lastname, email, password_hash, yob, id_hobby) VALUES (
        '{$user->name}',
        '{$user->lastname}',
        '{$user->email}',
        '$hash',
        {$user->yob}, 
        {$user->id_hobby}
        );";
    if (!($conn->query($sql)))
        return "Signup failed";
    return "Signup successful";
}
<?php
require_once(dirname(__FILE__) ."/../functions/utility.php");

function fetch_user(mysqli $conn, int $id) : array {
    $sql = "SELECT name, lastname, email, yob, hobbies.description FROM 
        users JOIN hobbies on id_hobby = hobbies.id
        WHERE users.id = $id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

function login_user (mysqli $conn, string $email, string $password) : string{
    if (!check_if_user_present($conn, $email))
        return "User not existent, please register";
    $hash = md5($password);
    $sql = "SELECT id FROM user WHERE email = '$email' and password_hash = '$hash'";
    $result = $conn->query($sql);
    if ($result->num_rows === 0)
        return "Incorrect email or password";
    $row = $result->fetch_assoc();
    $_SESSION["id"] = $row["id"];
    $user = fetch_user($conn, $row["id"]);
    foreach ($user as $key => $value) {
        $_SESSION[$key] = $value;
    }
    return "Successful login";
}
<?php
function check_if_user_present(mysqli $conn, string $email) : bool {
    $sql = "SELECT id FROM USERS WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return true;
    return false;
}
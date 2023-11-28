<?php
require_once(dirname(__FILE__) ."../config/db_connect.php");
session_start();
$is_log_on = isset($_SESSION["id"]);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signin page</title>
</head>
<body>
    <?php if ($is_log_on) { ?> 
    <h1>Benvenuto <?php echo $_SESSION["name"]." ".$_SESSION["lastname"];?></h1>
    <a href='index.php'>Per accedere a più contenuti</a>
    <?php } else { ?>
    <form action='signin.php' method='post'>
        <h1>Signin form</h1>
        <label for='email'>Email:</label>
        <input type='email' name='email' id='email'>
        <label for='password'>Password:</label>
        <input type='password' name='password' id='password'>
        <?php
        require_once(dirname(__FILE__) ."/../src/signin.php");
        echo "<span>".login_user($conn, $_POST["email"], $_POST["password"])."</span>";
        ?>
    </form>
    <?php } ?>
</body>
</html>
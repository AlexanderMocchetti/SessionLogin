<?php
require_once(dirname(__FILE__) ."/../config/db_connect.php");
session_start();
$is_log_on = isset($_SESSION["id"]);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signin page</title>
</head>
<body>
    <?php if ($is_log_on) { ?> 
    <h1 class='mt-2 text-center'><strong class='text-primary-emphasis border rounded p-1'>Benvenuto <?php echo $_SESSION["name"]." ".$_SESSION["lastname"];?>!</strong></h1>
    <?php } else { ?>
    <form class='p-2 mt-5 mx-auto border rounded w-75' action='signin.php' method='post'>
        <h1 class='mt-2 text-center'><strong class='text-primary-emphasis border rounded p-1'>Signup form</strong></h1>
        <div class='mb-3'>
            <label class='form-label' for='email'>Email</label>
            <input class='form-control' type='email' name='email' id='email' maxlength='150' required>
        </div>
        <div class='mb-3'>
            <label class='form-label' for='password'>Password</label>
            <input class='form-control' type='password' name='password' id='password' maxlength='32' required>
        </div>
        <?php
        require_once(dirname(__FILE__) ."/../src/signin.php");
        if ($_SERVER["REQUEST_METHOD"] === "POST")
            echo "<span>".login_user($conn, $_POST["email"], $_POST["password"])."</span>";
        ?>
        <button class='btn btn-outline-primary' type='submit'>Invia</button>
    </form>
    <?php } ?>
</body>
</html>
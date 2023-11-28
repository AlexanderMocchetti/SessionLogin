<?php
session_start();
$is_log_on = isset($_SESSION["id"]);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Main page</title>
</head>
<body>
    <?php if ($is_log_on) {
    ?> 
    <?php } else { ?>
    <?php } ?>
</body>
</html>
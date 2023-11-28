<?php
require_once(dirname(__FILE__) ."../config/db_connect.php");
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signup page</title>
</head>
<body>
    <form action='' method='post'>
        <h1>Signup form:</h1>
        <label for='name'>Name:</label>
        <input type='text' name='name' id='name' maxlength='50' required>
        <label for='lastname'>Lastname:</label>
        <input type='text' name='lastname' id='lastname' maxlength='50' required>
        <label for='yob'>Year of birth:</label>
        <input type='number' name='yob' id='yob' required>
        <label for='email'>Email:</label>
        <input type='email' name='email' id='email' maxlength='150' required>
        <label for='password'>Password:</label>
        <input type='password' name='password' id='password' maxlength='32' required>
        <?php
        $sql = "SELECT id, description FROM hobbies";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<label for='hobby'>Hobbies:</label><select id='hobby' name='hobby'>";
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $description = $row["description"];
                echo "<option value='". $id ."'>". $description ."</option>";
            }
            echo "</select>";
        } else {
            echo "<span>No hobbies</span>";
        }
        ?>
        <?php
        require_once(dirname(__FILE__) ."../src/signup.php");
        $user = fetch_user($_POST);
        echo register_user($conn, $user);
        ?>
    </form>
</body>
</html>
<?php
$conn->close();
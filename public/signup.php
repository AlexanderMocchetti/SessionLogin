<?php
require_once(dirname(__FILE__) ."/../config/db_connect.php");
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signup page</title>
</head>
<body>
    <form class='p-2 mt-5 mx-auto border rounded w-75' action='' method='post'>
        <h1 class='mt-2 text-center'><strong class='text-primary-emphasis border rounded p-1'>Signup form</strong></h1>
        <div class='mb-3'>
            <label class='form-label' for='name'>Name</label>
            <input class='form-control' type='text' name='name' id='name' maxlength='50' required>
        </div>
        <div class='mb-3'>
            <label class='form-label' for='lastname'>Lastname</label>
            <input class='form-control' type='text' name='lastname' id='lastname' maxlength='50' required>
        </div>
        <div class='mb-3'>
            <label class='form-label' for='yob'>Year of birth</label>
            <input class='form-control' type='number' name='yob' id='yob' required>
        </div>
        <div class='mb-3'>
            <label class='form-label' for='email'>Email</label>
            <input class='form-control' type='email' name='email' id='email' maxlength='150' required>
        </div>
        <div class='mb-3'>
            <label class='form-label' for='password'>Password</label>
            <input class='form-control' type='password' name='password' id='password' maxlength='32' required>
        </div>
        <?php
        $sql = "SELECT id, description FROM hobbies";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<label class='form-label' for='hobby'>Hobbies</label><select class='mb-3 form-select' id='hobby' name='hobby'>";
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
        require_once(dirname(__FILE__) ."/../src/signup.php");
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = fetch_user($_POST);
            echo register_user($conn, $user);
        }
        ?>
        <button class='btn btn-outline-primary' type='submit'>Invia</button>
    </form>
</body>
</html>
<?php
$conn->close();
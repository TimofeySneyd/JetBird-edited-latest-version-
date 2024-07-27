<?php
#if user is already logged in then there is no need to register page 
session_start();
if (isset($_SESSION["user"])) {
    header("Location: jetBirdMain.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JetBird Register</title>
        <link rel="stylesheet" href="jetbirdLoginRegisterStyle.css">
    </head>
    <body>
        <div class="wrapperJB">
            <div class="logoContainerJB">
                <img src="imagesJB/logo.png" alt="Logo" class="logoJB">
            </div>
            <?php
            if (isset($_POST["submitBttn"])) {
                $fullnameJB = $_POST["fullname"];
                $emailJB = $_POST["email"];
                $passwordJB = $_POST["password"];
                $repeatPasswordJB = $_POST["repeatPassword"];
                $passwordHashJB = password_hash($passwordJB, PASSWORD_DEFAULT); #password encryption.
                $errorsJB = array();

                #check if all field is empty.
                if (empty($fullnameJB) OR empty($emailJB) OR empty($passwordJB) OR empty($repeatPasswordJB)) {
                    array_push($errorsJB, "All fields are required!");
                }
                #validate email.
                if (!filter_var($emailJB, FILTER_VALIDATE_EMAIL)) {
                    array_push($errorsJB, "Please use a valid email!");
                }
                #password requirment.
                if (strlen($passwordJB) < 8) {
                    array_push($errorsJB, "The password must at least contain 8 characters long!");
                }
                #check password match.
                if ($passwordJB !== $repeatPasswordJB) {
                    array_push($errorsJB, "The password does not match!");
                }
                #check existing email
                require_once "jetBirdDB.php"; #connect to db
                $sqlEmail = "SELECT * FROM jetbirduser WHERE email = '$emailJB'";
                $sqlResult = mysqli_query($connectJB, $sqlEmail);
                $sqlRows = mysqli_num_rows($sqlResult);
                if ($sqlRows > 0) {
                    array_push($errorsJB, "Email already exists!");
                }
                #check for errors.
                if (count($errorsJB) > 0) {
                    foreach ($errorsJB as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    $sql = "INSERT INTO jetbirduser(fullName, email, password) VALUES ( ?, ?, ? )";
                    $stmt = mysqli_stmt_init($connectJB);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "sss", $fullnameJB, $emailJB, $passwordHashJB);
                        mysqli_execute($stmt);
                        echo "<div class='alert alert-success'>Register Complete!</div>";
                    } else {
                        die("Error..");
                    }
                }
            }
            ?>
            <h2>Registration</h2>
            <form action="jetbirdRegister.php" method="post">
                <div class="inputBoxJB">
                    <input type="text" name="fullname" placeholder="Enter your name">
                </div>
                <div class="inputBoxJB">
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="inputBoxJB">
                    <input type="password" name="password" placeholder="Create password">
                </div>
                <div class="inputBoxJB">
                    <input type="password" name="repeatPassword" placeholder="Confirm password">
                </div>
                <div class="policy">
                    <input type="checkbox" required>
                    <h3>I accept all terms & condition</h3>
                </div>
                <div class="inputBoxJB BttnJB">
                    <input type="submit" name="submitBttn" value="Register">
                </div>
                <div class="loginTextJB">
                    <h3>Already have an account? <a href="index.php">Login now</a></h3>
                </div>
            </form>
        </div>
    </body>
</html>
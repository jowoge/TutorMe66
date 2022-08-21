<!-- actions for registration page -->
<?php
if(isset($_POST["submit"])){
    // local database connection
    // require_once '$dbConn.php';
    // clearDB connection
    require_once '$clearDbConn.php';

    require_once '$functions.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $type = $_POST['type'];

    if (empty($email) || empty($password) || empty($type)) {
        header("Location: registration.php?error=please fill in all fields");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: registration.php?error=invalid email");
        exit();
    }

    if(emailExists($conn, $email)){
        header("Location: registration.php?error=email taken");
        exit();
    }

    if($password !== $passwordRepeat){
        header("Location: registration.php?error=passwords do not match");
        exit();
    }

    createUser($conn, $email, $password, $type);
    
}
else{
    header("location: registration.php?error=");
}
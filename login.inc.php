<!-- actions for login page -->
<?php
if(isset($_POST["submit"])){
    // local database connection
    // require_once '$dbConn.php';
    // clearDB connection
    require_once '$clearDbConn.php';

    require_once '$functions.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // if (empty($username) || empty($password)) {
    if (empty($email) || empty($password)) {
        header("Location: login.php?error=please fill in all fields");
        exit();
    }

    loginUser($conn, $email, $password);
}
else{
    header("location: login.php?error=");
}
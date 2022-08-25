<!-- tutee profile page actions -->
<?php
if(isset($_POST["submit"])){
    session_start();
    $id = $_SESSION['id']; 
    // local database connection
    // require_once '$dbConn.php';
    // clearDB connection
    require_once '$clearDbConn.php';

    require_once '$functions.php';

    // $username = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    if (empty($name) || empty($phone)) {
        header("Location: profile.tutee.php?error=please fill in all fields");
        exit();
    }
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name) || !preg_match("/^[a-zA-Z0-9]*$/", $phone)) {
        header("Location: profile.tutee.php?error=invalid data");
        exit();
    }  

    $result = mysqli_query($conn, "UPDATE users SET name = '".$name."', phone = '".$phone."' WHERE id = '".$id."'");
    if($result){
        header("Location: profile.tutee.php?error=profile updated");
        exit();
    }
}
else{
    header("location: index.php");
    exit();
}


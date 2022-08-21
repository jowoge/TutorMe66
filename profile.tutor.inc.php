<!-- tutor profile page actions -->
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
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $time = $_POST['time'];
    $education = $_POST['education'];
    $subject = $_POST['subject'];

    if (empty($name) || empty($phone)) {
        header("Location: profile.tutor.php?error=please fill in all fields");
        exit();
    }
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name) || !preg_match("/^[a-zA-Z0-9]*$/", $phone)) {
        header("Location: profile.tutor.php?error=invalid data");
        exit();
    }  
    
    $asql = "UPDATE users SET
    name = '".$name."',
    phone = '".$phone."',
    gender = '".$gender."',
    location = '".$location."',
    time = '".$time."',
    education = '".$education."',
    subject = '".$subject."'
    WHERE id = '".$id."'";

    $result = mysqli_query($conn, $asql);
    if($result){
        header("Location: profile.tutor.php?error=profile updated");
        exit();
    }
}
else{
    header("location: index.php");
    exit();
}

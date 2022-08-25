<?php
// no access to profile page if not logged in
session_start();
if(!$_SESSION['email']){
    header("Location: index.php");
    exit();
}
// get data of logged in user
// require_once '$dbConn.php';
require_once '$clearDbConn.php';

$id = $_SESSION['id']; 
$asql = "SELECT * FROM users WHERE id = '".$id."'";
$result = mysqli_query($conn, $asql);
if (mysqli_num_rows($result) > 0) {
    //get data from row
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: profile.php?error=user not found in database");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- Links/navbar (sit on top) -->
<div class="w3-bar w3-black w3-top">
<a class="w3-col s2 w3-button w3-block w3-black w3-mobile" href="index.php">HOME</a>
<a class="w3-col s2 w3-button w3-block w3-black w3-mobile" href="tutors.php?location=&time=&education=&subject=">TUTORS</a>
<a class="w3-col s2 w3-button w3-block w3-black w3-mobile" href="book.php">BOOK</a>
<?php
if(isset($_SESSION['type'])){
    if($_SESSION['type'] == 'tutee'){
      echo '<a class="w3-col s2 w3-button w3-block w3-black w3-mobile" href="book.php">BOOK</a>';
    }
}else{
    echo '<a class="w3-col s2 w3-button w3-block w3-black w3-mobile" href="book.php">BOOK</a>';
}
if(isset($_SESSION['email'])){
    echo '<a class="w3-col s2 w3-button w3-block w3-black w3-mobile w3-right" href="$logout.php">Logout</a>';
    echo '<a class="w3-col s2 w3-button w3-block w3-black w3-mobile w3-right" href="profile.php?error=">Profile</a>';
}else{
    echo '<a class="w3-col s2 w3-button w3-block w3-black w3-mobile w3-right" href="login.php?error=">Login</a>';
    echo '<a class="w3-col s2 w3-button w3-block w3-black w3-mobile w3-right" href="registration.php?error=">Register</a>';
}
?>
</div>
<!-- Links/navbar (sit on top) -->

<div class="w3-display-topmiddle w3-center w3-col s6">
<br><br><h1>PROFILE</h1>
<form action="profile.tutee.inc.php" method="post">
<?php
echo '<label>email</label><input type="text" name="email" value="'.$row['email'].'" readonly>';
// echo '<div><input type="text" name="address" value="'.$row['address'].'"></div>';
echo '<label>name</label><input type="text" name="name" value="'.$row['name'].'" required>';
echo '<label>contact</label><input type="text" name="phone" value="'.$row['phone'].'" required>';
?>
<button type="submit" name="submit">update</button>
<?php
if($_GET['error']){echo '<div class="w3-display-container w3-panel w3-red"><p>'.$_GET['error'].'</p><div>';}
?>
</div>
</body>
</html>

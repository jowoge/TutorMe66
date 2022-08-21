<!-- registration page -->
<?php
session_start();
if($_SESSION){
    header("Location: index.php");
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

<!-- registration form -->
<div class="w3-display-middle w3-center w3-col s6">
<h1>REGISTRATION</h1>
<form action="registration.inc.php" method="post">
<input type="text" name="email" placeholder="Email (this will be your username)" required>
<input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
<input type="password" name="passwordRepeat" placeholder="Repeat password" required>
<select name="type" class="w3-select">
<option label="Please select" hidden></option>
<option value="tutor">tutor</option>
<option value="tutee">tutee</option>
</select>
<button type="submit" name="submit">register</button>
</form>
<?php
if($_GET['error']){
    if($_GET['error'] == 'none'){
        echo '<div class="w3-display-container w3-panel w3-green"><p>user has been successfully created :)</p><div>';
    }else{
        echo '<div class="w3-display-container w3-panel w3-red"><p>'.$_GET['error'].'</p><div>';
    }
}
?>
</div>

</body>
</html>
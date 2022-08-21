<!-- list of tutors page -->
<?php
session_start();
// require_once '$dbConn.php';
require_once '$clearDbConn.php';
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

<!-- search form -->
<div class="w3-display-topmiddle w3-center w3-col s8">
<br><br><h1>TUTORS</h1>
<p><b>Preferences</b></p>
<form action="tutors.inc.php" method="post">
<label>Location</label><select name="location" class="w3-select w3-center w3-light-grey">
<!-- <option label=""></option> -->
<?php echo '<option label="'.$_GET['location'].'" hidden></option>'; ?>
<option value=""></option>
<option value="East">East</option>
<option value="West">West</option>
<option value="North">North</option>
<option value="South">South</option>
<option value="Central">Central</option>
</select>
<label>Time</label><select name="time" class="w3-select w3-center w3-light-grey">
<?php echo '<option label="'.$_GET['time'].'" hidden></option>'; ?>
<option value=""></option>
<option value="Morning">Morning</option>
<option value="Afternoon">Afternoon</option>
<option value="Night">Night</option>
<option value="Allday">All-day</option>
</select>
<label>Education</label><select name="education" class="w3-select w3-center w3-light-grey">
<?php echo '<option label="'.$_GET['education'].'" hidden></option>'; ?>
<option value=""></option>
<option value="Primary">Primary</option>
<option value="Secondary">Secondary</option>
<option value="JC">JC</option>
</select>
<label>Subject</label><select name="subject" class="w3-select w3-center w3-light-grey">
<?php echo '<option label="'.$_GET['subject'].'" hidden></option>'; ?>
<option value=""></option>
<option value="English">English</option>
<option value="Math">Math</option>
<option value="Science">Science</option>
<option value="Others">Others</option>
</select>

<button type="submit" name="submit">search</button>

</form>
<?php
if($_GET['location']){$location = "and location = '".$_GET['location']."'";}else{$location = "";}
if($_GET['time']){$time = "and time = '".$_GET['time']."'";}else{$time = "";}
if($_GET['education']){$education = "and education = '".$_GET['education']."'";}else{$education = "";}
if($_GET['subject']){$subject = "and subject = '".$_GET['subject']."'";}else{$subject = "";}
// show all tutors
$asql = "SELECT * FROM users WHERE name != '' and type = 'tutor'".$location.$time.$education.$subject;
$result = mysqli_query($conn, $asql);
if (mysqli_num_rows($result) > 0) {
    //output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="w3-card-4"><header class="w3-container w3-light-grey">';
        echo '<h3>'.$row['name'].'</h3></header>';
        echo '<div class="w3-container">';
        echo '<br><img src="" alt="profile picture (not available)" class="w3-center w3-circle">';
        echo '<p>'.$row['location'].'<br>'.$row['time'].'<br>'.$row['education'].'<br>'.$row['subject'].'</p>';
        echo '<p>/*testimonial in review*/</p>';
        $book = "book.php?name=".$row['name'];
        echo '<a class="w3-button w3-block w3-dark-grey" href='.$book.'>Book</a><br></div></div><br>';
    }
} else {
    // header("Location: tutors.php?error=no users in database");
    // exit();
    echo "<div>no users matching criteria</div>";
}
?>
<!-- </div> -->

</body>
</html>
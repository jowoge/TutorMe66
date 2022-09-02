<!-- homepage -->
<?php
session_start();
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


<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container">
<div class="w3-content" style="max-width:700px">
<h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Your One Stop Tutoring Service</span></h5>
<div class="w3-panel w3-leftbar w3-light-grey">
<p><i>"Knowledge is of no value unless you put it into practice"</i></p>
<p>-Anton Chekhov</p>
</div>
<p><strong>Opening hours:</strong> Monday to Saturday, 9am to 6pm</p>
<p><strong>Address:</strong> SIM, Clementi</p>
</div>
</div>

<!-- About Container -->
<div class="w3-container" id="about">
<div class="w3-content" style="max-width:700px">
<h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT TUTORME</span></h5>
<p>TutorMe was founded with the mission of matchmaking the perfect tutor with the perfect student. Everybody has different
learning abilities and pace, and we want to accomplish the optimal capabilities of a student, and having the 
right tutor for that is extremely important.
</p>
<div class="w3-panel w3-leftbar w3-light-grey">
<p><i>Our Mission: Accomplish the optimal learning capabilities of a student</i></p>
<p><i>Our Objectives: Ensure that every student will be able to find the perfect tutor for them according
to their learning paces and abilities</i>
</p>
</div>
</div>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
<div class="column">
<div class="card">
<div class="container">
<h2>Sam Lah</h2>
<p class="title">CEO & Founder</p>
<p>Awesome person</p>
<p>sam@yahoo.com.sg</p>

</div>
</div>
</div>

<div class="column">
<div class="card">
<div class="container">
<h2>Amelie</h2>
<p class="title">Director</p>
<p>Another awesome person</p>
<p>amelie@yahoo.com.sg</p>

</div>
</div>
</div>

<div class="column">
<div class="card">
<div class="container">
<h2>John</h2>
<p class="title">Designer</p>
<p>Awesome person</p>
<p>john@yahoo.com</p>
</div>
</div>
</div>

<div class="column">
<div class="card">
<div class="container">
<h2>Isabelle</h2>
<p class="title">Assistant Designer</p>
<p>Awesome person</p>
<p>isabelle@yahoo.com</p>
</div>
</div>
</div>

<div class="column">
<div class="card">
<div class="container">
<h2>Wen Hao</h2>
<p class="title">Assistant Director</p>
<p>Awesome person</p>
<p>sy@yahoo.com</p>
</div>
</div>
</div>
</div>
</body>
</html>

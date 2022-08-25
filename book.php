<!-- booking page -->
<?php
session_start();
if(!$_SESSION){
  header("Location: login.php");
  exit();
}
if($_SESSION['type'] == 'tutor'){
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
<div class="about-section">
    <h1>Book Tutor</h1>
    <p>Here is the opportunity to book your tutor now!</p>
  </div>

  <div class="w3-container" id="about">
    <div class="row">
        <div class="column">
          <div class="card">

  <form action="/action_page.php">
    <label for="cars">Choose a Tutor:</label>
    <select id="cars" name="cars">
      <option value="volvo">Sam Lah</option>
      <option value="saab">Amelie</option>
      <option value="fiat">Isa</option>
      <option value="audi">John</option>
      <option value="audi">Wen Hao</option>
    </select>

  </form>
</div>
</div>
</div>
</div>
 
<div class="w3-container" id="about">
    <div class="row">
        <div class="column">
          <div class="card">
<form action="/action_page.php">
    <label for="cars">Choose a timing:</label>
    <select id="cars" name="cars">
      <option value="volvo">0900-1100</option>
      <option value="saab">1100-1300</option>
      <option value="fiat">1300-1500</option>
      <option value="audi">1500-1700</option>
      <option value="audi">1700-1900</option>
    </select>

  </form>
</div>
</div>
</div>
</div>

<div class="w3-container" id="about">
    <div class="row">
        <div class="column">
          <div class="card">
<form action="/action_page.php">
    <label for="cars">Choose a subject:</label>
    <select id="cars" name="cars">
      <option value="volvo">English</option>
      <option value="saab">Mathematics</option>
      <option value="fiat">Science</option>
      <option value="audi">Mother Tongue</option>
      <option value="audi">Humanities</option>
    </select>

  </form>
</div>
</div>
</div>
</div>

<div class="w3-container" id="about">
    <div class="row">
        <div class="column">
          <div class="card">
<form action="/action_page.php">
    <label for="cars">Select your location:</label>
    <select id="cars" name="cars">
      <option value="volvo">North-East</option>
      <option value="saab">East</option>
      <option value="fiat">West</option>
      <option value="audi">North</option>
      <option value="audi">South</option>
    </select>

  </form>
</div>
</div>
</div>
</div>

<a href ="payment.php">
<div class="w3-container" id="about">
    <div class="row">
        <div class="column">
          <div class="card">

  <form action="/action_page.php">
    <fieldset  data-type = "horizontal">
    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
    <label for="vehicle1"> Monday</label><br>
    <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
    <label for="vehicle2"> Tuesday</label><br>
    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
    <label for="vehicle3"> Wednesday</label><br>
    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
    <label for="vehicle3"> Thursday</label><br>
    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
    <label for="vehicle3"> Friday</label><br>
    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
    <label for="vehicle3"> Saturday</label><br>
    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
    <label for="vehicle3"> Sunday</label><br><br>
    </form>
    <input type="submit" value="Submit">
</a>
</fieldset>
</div>
</div>
</div>
</div>


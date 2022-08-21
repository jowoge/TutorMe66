<!-- profile page -->
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

    <!-- profile -->
    <!-- <div class="w3-display-middle w3-center w3-col s6"> -->
    <div class="w3-display-topmiddle w3-center w3-col s6">
        <br><br>
        <h1>PROFILE</h1>
        <form action="profile.tutor.inc.php" method="post">
        <?php
        echo '<label>Email/Username</label><input type="text" name="email" value="'.$row['email'].'" readonly>';
        // echo '<div><input type="text" name="address" value="'.$row['address'].'"></div>';
        echo '<label>Name</label><input type="text" name="name" value="'.$row['name'].'" required>';
        echo '<label>Contact</label><input type="text" name="phone" value="'.$row['phone'].'" required>';
        echo '<label>Gender</label><select name="gender" class="w3-select w3-center w3-light-grey"><option value="'.$row['gender'].'" hidden>'.$row['gender'].'</option>';
        ?>
        <option value="F">F</option>
        <option value="M">M</option>
        </select>

        <p><b>Teaching Preferences</b></p>
        <?php
        echo '<label>Location</label><select name="location" class="w3-select w3-center w3-light-grey"><option value="'.$row['location'].'" hidden>'.$row['location'].'</option>';
        ?>
        <option value="East">East</option>
        <option value="West">West</option>
        <option value="North">North</option>
        <option value="South">South</option>
        <option value="Central">Central</option>
        </select>

        <?php
        echo '<br><br><label>Time</label><select name="time" class="w3-select w3-center w3-light-grey"><option value="'.$row['time'].'" hidden>'.$row['time'].'</option>';
        ?>
        <option value="Morning">Morning</option>
        <option value="Afternoon">Afternoon</option>
        <option value="Night">Night</option>
        <option value="All-day">All-day</option>
        </select>

        <?php
        echo '<br><br><label>Educational Level</label><select name="education" class="w3-select w3-center w3-light-grey"><option value="'.$row['education'].'" hidden>'.$row['education'].'</option>';
        ?>
        <option value="Primary">Primary</option>
        <option value="Secondary">Secondary</option>
        <option value="JC">JC</option>
        </select>

        <?php
        echo '<br><br><label>Subject</label><select name="subject" class="w3-select w3-center w3-light-grey"><option value="'.$row['subject'].'" hidden>'.$row['subject'].'</option>';
        ?>
        <option value="English">English</option>
        <option value="Math">Math</option>
        <option value="Science">Science</option>
        <option value="Others">Others</option>
        </select>

        <br><br><label>Profile Photo (upload not available)</label>
        <input type="file" name="image" disabled>
        <br><br><label>Testimonial  (upload not available)</label>
        <input type="file" name="cv" disabled>
        <button type="submit" name="submit">update</button>
        <?php
        if($_GET['error']){echo '<div class="w3-display-container w3-panel w3-red"><p>'.$_GET['error'].'</p><div>';}
        ?>
    </div>
</body>
</html>

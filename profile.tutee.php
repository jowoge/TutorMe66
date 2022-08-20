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
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Tutor Me</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="tutors.php">Tutors</a>
            </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <?php
            if(isset($_SESSION['email'])){
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="profile.php">Profile</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="$logout.php">Logout</a>';
                echo '</li>';
            }else{
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="registration.php">Register</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="login.php">Login</a>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
    </nav>
    <div>
        <form action="profile.tutee.inc.php" method="post">
        <?php
            echo '<div><p>email:</p><input type="text" name="email" value="'.$row['email'].'" readonly></div>';
            // echo '<div><input type="text" name="address" value="'.$row['address'].'"></div>';
            echo '<div><p>name:</p><input type="text" name="name" value="'.$row['name'].'"></div>';
            echo '<div><p>contact:</p><input type="text" name="phone" value="'.$row['phone'].'"></div>';
        ?>
        <div><button type="submit" name="submit">update</button></div>
    </div>
</body>
</html>
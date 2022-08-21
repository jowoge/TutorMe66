<?php
session_start();
if(!$_SESSION['email']){
    header("Location: index.php");
    exit();
}
if($_SESSION['type'] == 'tutee'){
    header("Location: profile.tutee.php?error=");
    exit();
}
if($_SESSION['type'] == 'tutor'){
    header("Location: profile.tutor.php?error=");
    exit();
}

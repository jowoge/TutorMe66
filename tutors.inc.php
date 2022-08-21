<!-- actions for login page -->
<?php
if(isset($_POST["submit"])){
    // local database connection
    // require_once '$dbConn.php';
    // clearDB connection
    require_once '$clearDbConn.php';
    

    header("location: tutors.php?location=".$_POST['location']."&time=".$_POST['time']."&education=".$_POST['education']."&subject=".$_POST['subject']);
   
}
// else{
//     header("location: tutors.php?error=");
// }
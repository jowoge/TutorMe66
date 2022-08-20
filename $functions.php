<?php
// check if email exists in database
function emailExists($conn, $email){
    // placeholder statement
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: registration.php?error=stmt failed");
        exit();
    }
    // bind param to placeholder statement
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

// create user
// function createUser($conn, $username, $email, $password){
function createUser($conn, $email, $password, $type){
    // $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    // placeholder statement
    $sql = "INSERT INTO users (email, password, type) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: registration.php?error=stmt failed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // bind param to placeholder statement
    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPassword, $type);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: registration.php?error=none");
}

// login user
function loginUser($conn, $email, $password){
    $emailExists = emailExists($conn, $email);

    if(!$emailExists){
        header("Location: login.php?error=user not found");
        exit();
    }

    $checkPassword = password_verify($password, $emailExists['password']);

    if(!$checkPassword){
        header("Location: login.php?error=wrong password");
        exit();
    }
    else if($checkPassword){
        session_start();
        $_SESSION['id'] = $emailExists['id'];
        $_SESSION['email'] = $emailExists['email'];
        $_SESSION['name'] = $emailExists['name'];
        $_SESSION['type'] = $emailExists['type'];
        header("Location: profile.php?error=");
        exit();
    }
}
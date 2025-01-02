<?php
session_start();

include '../database/auth.php';

$auth = new Auth();

$action = $_GET['action'];

if ($action == "login") {
    $result = $auth->login(
        $_POST['email'],
        $_POST['password']
    );

    if ($result) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['login_success'] = true;
        header("location:../login.php");
        exit(); 
    } else {
        $_SESSION['error'] = "Email atau password salah.";
        header("location:../login.php");
        exit();
    }
} else if ($action == "register") {
    $result = $auth->register(
        $_POST['username'], 
        $_POST['email'], 
        $_POST['password']
    );

    if ($result === true) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
    } else {
        $_SESSION['error'] = $result;
    }

    header("location:../register.php");
    exit();
}
?>
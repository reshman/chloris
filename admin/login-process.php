<?php
session_start();
include_once 'functions.php';
include_once 'db.php';
$_SESSION['auth']  = array();
$_SESSION['error'] = array();

$username = sanatizeInput($_POST['email'], 'string');
$password = md5(sanatizeInput($_POST['password'], 'string'));

$sqlAuth  = sprintf("SELECT * FROM user WHERE email = '%s' AND password = '%s' AND id = '%s'", $username, $password, 1);

$result   = mysqli_query($link, $sqlAuth);

if (mysqli_num_rows($result) > 0) {
    $users = mysqli_fetch_object($result);
    $_SESSION['auth'] = array('id' => $users->id, 'username' => $users->username);
    header('location:dashboard.php');
} else {
    $_SESSION['error'] = array(
        'message' => 'Username or Password is incorrect!',
        'type'    => 'danger'
    );

    header('location:index.php');
}



<?php

$host     = "localhost";
$username = "root";
$password = "";
$database = "chloris";

$link = mysqli_connect($host, $username, $password, $database) or die(mysqli_connect_error($link));
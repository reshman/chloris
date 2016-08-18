<?php

$host     = "localhost";
$username = "demoximr_chloris";
$password = "chloris@shop";
$database = "demoximr_chloris";

$link = mysqli_connect($host, $username, $password, $database) or die(mysqli_connect_error($link));
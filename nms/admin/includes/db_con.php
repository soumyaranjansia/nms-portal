<?php

// connection to database
$connection = mysqli_connect('localhost:3307', 'root', '', 'noiseapp');

if (!$connection == true) {
    die("Database Connection Failed.");
}
?>
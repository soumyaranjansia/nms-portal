<?php
if(!isset($_SESSION)) { session_start(); }
// connection to database
$connection = mysqli_connect('localhost:3307', 'root', '', 'noiseapp');

if (!$connection == true) {
    die("Database Connection Failed.");
    
}
?>
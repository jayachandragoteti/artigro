<?php
// Create connection
$connect=mysqli_connect('localhost', 'root', '', 'artigro');
//$connect=mysqli_connect('localhost',"qp5uwu6wq87f","Girish@falcon5",'artigro');
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
  }
 // echo "Connected successfully";
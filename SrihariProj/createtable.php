<?php
$host="localhost";
$_user="root";
$_pass="";
$db="darkchat";
$con=mysqli_connect($host,$_user,$_pass,$db);
$sql="CREATE TABLE details(username VARCHAR (100) PRIMARY KEY, password VARCHAR (15), gender VARCHAR (3), contact INT)";
$sql1="CREATE TABLE FRIENDS (friend1 VARCHAR (100), friend2 VARCHAR (100))";
$sql2="CREATE TABLE CHAT(sender VARCHAR(100),reciever VARCHAR(100),message VARCHAR(255))";
$res=mysqli_query($con,$sql);
$res=mysqli_query($con,$sql1);
$res=mysqli_query($con,$sql2);
?>

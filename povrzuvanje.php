<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="baza";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno())
{
    die("Database connection failed".mysqli_connect_error()."(".mysqli_conect_errno().")");
}
$query="SELECT * FROM fakultet;";
$result= mysqli_query($connection, $query);
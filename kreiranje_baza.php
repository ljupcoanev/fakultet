<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass);
$query = "CREATE DATABASE baza";
mysqli_query($connection, $query);
mysqli_close($connection);
$dbname="baza";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$query = "CREATE TABLE fakultet(id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, ime VARCHAR(30) NOT NULL, prezime VARCHAR(30) NOT NULL, korisnicko VARCHAR(50) NOT NULL, lozinka VARCHAR(30) NOT NULL, profesija VARCHAR(30) NOT NULL, vrednost INT(30) NOT NULL)";
mysqli_query($connection, $query);
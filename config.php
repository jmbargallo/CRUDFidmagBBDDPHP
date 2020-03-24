<?php

$conn= new mysqli("localhost","root","","investigadores");

if ($conn->connect_error){
    die ("No es pot conectar a la base de dades".$conn->connect_error);
}


?>
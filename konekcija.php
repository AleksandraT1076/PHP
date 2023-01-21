<?php

$conn = new mysqli("localhost", "root", "", "instrumentiPHP");

if ($conn->connect_errno){
    exit("Greska: ".$conn->connect_error);
}
?>
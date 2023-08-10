<?php

$conn = new mysqli("localhost", "root", "usbw", "notices");
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
    //Used to make a  connection to the database
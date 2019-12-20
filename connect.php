<?php
    //Connect Server
    $conn = new mysqli("localhost","root","12345678","usedcar-009-2");
    if($conn->connect_errno){
        die("Connection failed:" .$conn->connect_error);
    }
?>
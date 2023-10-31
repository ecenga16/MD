<?php
    $USER_query  = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword';";
    $DOCTOR_query =  "SELECT doctors.* FROM users, doctors WHERE  doctors.userid= '$_SESSION['id']';";
    $DOCTOR_UPDATE = "";
    $DOCTOR_INSERT = "";
    $DOCTOR_DELETE = "";
?>
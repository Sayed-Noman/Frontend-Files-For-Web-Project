<?php
    require_once'../../php/dbConnect.php';
    if(isset($_GET['quickView'])){
        $Email=base64_decode($_GET['requestDelete']);
        $query="SELECT * FROM `request` WHERE `Email`='$Email'";
        $queryResult=mysqli_query($dbConnect,$query);
         header('location:../admin_request_accept.php');

    }


?>
<?php
	include "connection.php";
    include "validate.php";

    $qry = mysqli_query($conn, "DELETE FROM user WHERE USER_KODE = '". $_GET["kode"] ."'  ");

    if(mysqli_affected_rows($conn) > 0){

    }else{

    }
    header("location:user.php");

?>
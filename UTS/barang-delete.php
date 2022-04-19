<?php
	include "connection.php";
    include "validate.php";

    $qry = mysqli_query($conn, "DELETE FROM barang WHERE BRG_KODE = '". $_GET["kode"] ."'  ");

    if(mysqli_affected_rows($conn) > 0){

    }else{

    }
    header("location:barang.php");

?>
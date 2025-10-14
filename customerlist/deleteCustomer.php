<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    include "../includes/db.php";
    $con = getDBConnection();

    $query = "delete FROM customerlist where CustomerID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
}
header ("Location:index.php");
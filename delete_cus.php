<?php
    include_once("config.php");
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM customers WHERE id=$id");
    header("Location: employee.php");
?>
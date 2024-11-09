<?php
include"../config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
   
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$_SESSION['reply'] = "Deleted Successfully";
  header("location:../traveller_details.php");
$conn = null;
?>
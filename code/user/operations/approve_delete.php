<?php session_start();?>
<?php
require_once('../check_login.php');
?>
<?php
include"../config.php";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM travellers WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "Record deleted successfully";
            //  $_SESSION['reply'] = "Record deleted successfully";
        header("location:../approveuser_entry.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
 
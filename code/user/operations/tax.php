<?php
require_once('../check_login.php');
?>
<?php
include"../config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit']))
    {
        $sql = "INSERT INTO tax (tname, percent, short_code)
            VALUES ('".$_POST['tname']."', '".$_POST['percent']."', '".$_POST['short_code']."')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../tax_details.php");
    }
    if(isset($_POST['update']))
         
    {
        $sql = "UPDATE tax SET tname='".$_POST['tname']."',
    percent='".$_POST['percent']."',
    short_code='".$_POST['short_code']."'
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['reply'] = "Added Successfully";
        header("location:../tax_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM tax WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
             $_SESSION['reply'] = "Record deleted successfully";
        header("location:../tax_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
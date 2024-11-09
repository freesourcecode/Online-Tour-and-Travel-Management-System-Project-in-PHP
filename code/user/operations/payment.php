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
        $sql = "INSERT INTO payment_type (payment_type)
            VALUES ('".$_POST['payment_type']."')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            $_SESSION['reply'] = "Added Successfully";
        header("location:../payment_details.php");
    }
    if(isset($_POST['update']))
         
    {
        $sql = "UPDATE payment_type SET payment_type='".$_POST['payment_type']."'
        WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['reply'] = "Updated Successfully";
        header("location:../payment_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM payment_type WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
             $_SESSION['reply'] = "Record deleted successfully";
        header("location:../payment_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
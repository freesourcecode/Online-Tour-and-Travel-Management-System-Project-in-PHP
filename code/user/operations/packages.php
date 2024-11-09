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
        $sql = "INSERT INTO packages (pname,price_adult,price_children)
            VALUES ('".$_POST['pname']."', '".$_POST['price_adult']."', '".$_POST['price_children']."')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            $_SESSION['reply'] = "Added Successfully";
        header("location:../package_details.php");
    }
    if(isset($_POST['update']))
         
    {
        $sql = "UPDATE packages SET pname='".$_POST['pname']."',
    price_adult='".$_POST['price_adult']."',
    price_children='".$_POST['price_children']."'
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['reply'] = "Updated Successfully";
        header("location:../package_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM packages WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
             $_SESSION['reply'] = "Record deleted successfully";
        header("location:../package_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
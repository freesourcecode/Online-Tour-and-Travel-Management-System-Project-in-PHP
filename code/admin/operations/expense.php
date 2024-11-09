
<?php
require_once('../check_login.php');
?>
<?php
include"../config.php";
date_default_timezone_set('Asia/Kolkata');
$current_date=date('Y-m-d');
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit']))
    {
        $sql = "INSERT INTO expense (expense_for, expense_name, amount,created_date)
            VALUES ('".$_POST['expense_for']."','".$_POST['expense_name']."','".$_POST['amount']."', CURDATE())";
            // use exec() because no results are returned
            $conn->exec($sql);
             $_SESSION['success']=' Record Added Successfully.....';
            // echo "New record created successfully";
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../expense_details.php");
    }
    if(isset($_POST['update']))
         
    {
        $sql = "UPDATE expense SET expense_for='".$_POST['expense_for']."',
        expense_name='".$_POST['expense_name']."',
        amount='".$_POST['amount']."'
    
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
      $_SESSION['success']=' Record Updated Successfully......';
     // $_SESSION['reply'] = "Updated Successfully";
        header("location:../expense_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM expense WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
             $_SESSION['success']=' Record Successfully Deleted';
            // echo "Record deleted successfully";
            //  $_SESSION['reply'] = "Record deleted successfully";
        header("location:../expense_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
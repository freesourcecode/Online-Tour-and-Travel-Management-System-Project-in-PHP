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
        echo $sql = "INSERT INTO expense_category(expense_name,status)
            VALUES ('".$_POST['expense_name']."', '".$_POST['status']."')";
            // use exec() because no results are returned
            $conn->exec($sql);
             $_SESSION['success']=' Record Added Successfully.....';
            // echo "New record created successfully";
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../expense_category_details.php");
    }
    if(isset($_POST['update']))
         
    {
        echo $sql = "UPDATE expense_category SET expense_name='".$_POST['expense_name']."',
               status='".$_POST['status']."'
    
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);
        
    // execute the query
    $stmt->execute();
     $_SESSION['success']=' Record Updated Successfully......';
     // $_SESSION['reply'] = "Updated Successfully";
        header("location:../expense_category_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM expense_category WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
             $_SESSION['success']=' Record Successfully Deleted';
             // $_SESSION['reply'] = "Record deleted successfully";
        header("location:../expense_category_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
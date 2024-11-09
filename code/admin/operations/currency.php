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
        $sql = "INSERT INTO currency (curr_code, curr_symbol)
            VALUES ('".$_POST['curr_code']."', '".$_POST['curr_symbol']."')";
            // use exec() because no results are returned
            $conn->exec($sql);
              $_SESSION['success']=' Record Added Successfully.....';
          // echo "New record created successfully";
          //   $_SESSION['reply'] = "Added Successfully";
        header("location:../currency_details.php");
    }
    if(isset($_POST['update']))
         
    {
        $sql = "UPDATE currency SET curr_code='".$_POST['curr_code']."',
    curr_symbol='".$_POST['curr_symbol']."'
    
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['success']=' Record Updated Successfully......';
     // $_SESSION['reply'] = "Added Successfully";
        header("location:../currency_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM currency WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
             $_SESSION['success']=' Record Successfully Deleted';
            // echo "Record deleted successfully";
            //  $_SESSION['reply'] = "Record deleted successfully";
        header("location:../currency_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>

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
        $package_id=explode(',',$_POST['package_id']);
        $sql = "INSERT INTO booking (traveller_id, state_id, package_id, no_of_adults,no_of_children,from_date,to_date,total_amount,adv_amount,total,tax,created_date)
            VALUES ('".$_SESSION['id']."','".$_POST['state_id']."', '".$package_id[0]."', '".$_POST['no_of_adults']."','".$_POST['no_of_children']."','".$_POST['from_date']."','".$_POST['to_date']."','".$_POST['total_amount']."','".$_POST['adv_amount']."','".$_POST['total']."','".$_POST['tax']."', CURDATE())";
            // use exec() because no results are returned

            $conn->exec($sql);
             // echo "<pre>";print_r($conn);exit;
            echo "New record created successfully";
            // $_SESSION['reply'] = "Added Successfully";

             $id = $conn->lastInsertId();
            $sql1 = "INSERT INTO payment(booking_id,amount,insert_amount,payment_type,cdate) VALUES ('".$id."','".$_POST['total_amount']."','".$_POST['adv_amount']."','".$_POST['payment_type']."',CURDATE())";
            // use exec() because no results are returned
             $conn->exec($sql1);
             $_SESSION['success']=' Record Added Successfully';
            // echo "New record created successfully";
            // $_SESSION['reply'] = "Added Successfully";
      
        header("location:../my_bookings.php");
    }
    // if(isset($_POST['update']))
         
    // {
    //     $sql = "UPDATE booking SET traveller_id='".$_POST['traveller_id']."',
    //     state_id='".$_POST['state_id']."',
    // package_id='".$_POST['package_id']."',
    // no_of_adults='".$_POST['no_of_adults']."',
    // no_of_children='".$_POST['no_of_children']."',
    // from_date='".$_POST['from_date']."',
    // to_date='".$_POST['to_date']."'
    //  WHERE id='".$_GET['edit_id']."'";

    // // Prepare statement
    // $stmt = $conn->prepare($sql);

    // // execute the query
    // $stmt->execute();
    //  $_SESSION['reply'] = "Added Successfully";
    //     header("location:../my_booking.php");
    // }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM booking WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "Record deleted successfully";
            $_SESSION['success']=' Record Successfully Deleted';
        header("location:../my_bookings.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
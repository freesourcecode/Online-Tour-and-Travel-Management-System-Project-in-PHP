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
        $stmt = $conn->prepare("SELECT * FROM payment where booking_id='".$_POST['booking_id']."' order by id desc "); 
      $stmt->execute();
    // $abc = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      //$row1=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
          // echo "<pre>";print_r($result);exit;
  
        //$sql = "INSERT INTO payment(booking_id,amount,paid_amount,pending_amount,insert_amount,payment_type,description,cdate) VALUES ('".$_POST['booking_id']."','".$_POST['total_amount']."','".$_POST['paid_amount']."','".$_POST['pending_amount']."','".$_POST['insert_amount']."','".$_POST['payment_type']."','".$_POST['description']."',CURDATE())";
    $sql = "INSERT INTO payment(booking_id,amount,paid_amount,pending_amount,insert_amount,payment_type,cdate,due_date) VALUES ('".$_POST['booking_id']."','".$_POST['total_amount']."','".$_POST['paid_amount']."','".$_POST['pending_amount']."','".$_POST['insert_amount']."','".$_POST['payment_type']."',CURDATE(),'".$_POST['due_date']."')";

              //echo "<pre>";print_r($sql);exit;
            // use exec() because no results are returned
             $conn->exec($sql);
             //echo "<pre>";print_r($conn);exit;
             
             $stmt1 = $conn->prepare("SELECT * from booking where id='".$result['booking_id']."'"); 
                 $stmt1->execute();
                $result1=$stmt1->fetch(PDO::FETCH_ASSOC);
           
             
                 // echo "<pre>";print_r($result2);exit;
               
     $_SESSION['reply'] = "Updated Successfully";
        header("location:../finance_details.php");

        //     echo "New record created successfully";
        //     $_SESSION['reply'] = "Added Successfully";
        // header("location:../finance_details.php");
   

    }
   
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
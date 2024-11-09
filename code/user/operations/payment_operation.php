<?php
require_once('../check_login.php');
?>
<?php
include"../config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // if(isset($_GET['id']))
 //    {
 //     $stmt = $conn->prepare("SELECT * FROM payment where booking_id='".$_GET['id']."' order by id desc "); 
 //      $stmt->execute();
 //    // $abc = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 //      //$row1=$stmt->setFetchMode(PDO::FETCH_ASSOC);
 //    $result=$stmt->fetch(PDO::FETCH_ASSOC);

 //    }

    if(isset($_POST['submit']))
    {
        $stmt = $conn->prepare("SELECT * FROM payment where booking_id='".$_POST['booking_id']."' order by id desc "); 
      $stmt->execute();
    // $abc = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      //$row1=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
          // echo "<pre>";print_r($result);exit;
      
        
         // echo "<pre>";print_r($a);exit;
        // $sql = "INSERT INTO payment(booking_id,amount,paid_amount,pending_amount,insert_amount,payment_type,description)
        //     VALUES ('".$_POST['booking_id']."','".$_POST['total_amount']."','".$_POST['paid_amount']."','".$a."', '".$_POST['insert_amount']."','".$_POST['payment_type']."','".$_POST['description']."')";
        //     // use exec() because no results are returned
        //     $conn->exec($sql);

     $pending=$result['pending_amount']-$_POST['insert_amount'];
           // echo "<pre>"; print_r($pending);exit;
     $paid=$result['paid_amount']+$_POST['insert_amount'];
      // echo "<pre>"; print_r($paid);exit;
        $sql = "UPDATE payment SET pending_amount='".$pending."',
              paid_amount='".$paid."',
            insert_amount='".$_POST['insert_amount']."',
            payment_type='".$_POST['payment_type']."',
             description='".$_POST['description']."'
         WHERE id='".$_GET['id']."'";
    
    // Prepare statement
    /*$stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();*/
     $_SESSION['reply'] = "Updated Successfully";
        header("location:../finance_details.php");

        //     echo "New record created successfully";
        //     $_SESSION['reply'] = "Added Successfully";
        // header("location:../finance_details.php");
   

    }
    // if(isset($_GET['id']))
    // {
    //     $sql = "DELETE FROM currency WHERE id='".$_GET['id']."'";

    //         // use exec() because no results are returned
    //         $conn->exec($sql);
    //         echo "Record deleted successfully";
    //          $_SESSION['reply'] = "Record deleted successfully";
    //     header("location:../currency_details.php");
    // }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
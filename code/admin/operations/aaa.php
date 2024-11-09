
<?php
include('../check_login.php');
?>
<?php
include"../config.php";
 //
try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         //echo "sdfsdf<pre>"; print_r($_POST); exit;
    if(isset($_POST['submit']))
    {

         $file_name=$_FILES['photo']['name'];
        $file_type=$_FILES['photo']['type'];
        $file_size=$_FILES['photo']['size'];
        $file_tem_loc=$_FILES['photo']['tmp_name'];
        $file_store="../../admin/img/".$file_name;
         if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 

            function createSalt()
             {
               return '2123293dsj2hu2nikhiljdsd';
             }
         $passw = hash('sha256', $_POST['val-password']);
         $salt = createSalt();
         $pass = hash('sha256', $salt . $passw);   
        echo $sql = "INSERT INTO travellers(name, email, password,confirm,state_name,mobile,address,photo)
            VALUES ('".$_POST['val-username']."','".$_POST['val-email']."', '".$pass."','".$_POST['val-confirm-password']."','".$_POST['state_name']."','".$_POST['val-digits']."','".$_POST['val-suggestions']."','".$file_name."')";
            // use exec() because no results are returned
            $conn->exec($sql);

           
                // if ($pass != $_POST['val-confirm-password'])
                //  {
                //    echo("Error... Passwords do not match");
                //  }
 

              //echo "<pre>";print_r($conn);exit;
           $_SESSION['success']=' Record Added Successfully.....';
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../traveller_details.php");
    }
    if(isset($_POST['update']))
         
    {
        if($_FILES['photo']['name']!='')
         {
        $file_name=$_FILES['photo']['name'];
        $file_type=$_FILES['photo']['type'];
        $file_size=$_FILES['photo']['size'];
        $file_tem_loc=$_FILES['photo']['tmp_name'];
        $file_store="../../admin/img/".$file_name;
           

        if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 
          
      }
      else
      {
        $file_name=$_POST['old_img'];
    }
    
        $folder="../../admin/img/";
    
        if(is_dir($folder))
         {
          if($open=opendir($folder))

           while(($photo=readdir($open)) !=false)
          {
            if($photo=='.'|| $photo=="..") continue;
              
            echo '<img src="../../admin/img/'.$photo.'" width="150" height="150">';
          
          }
        
              closedir($open);
         }

            if($_POST['val-password']!='')
            {
            function createSalt()
             {
               return '2123293dsj2hu2nikhiljdsd';
             }
         $passw = hash('sha256', $_POST['val-password']);
         $salt = createSalt();
         $passw = hash('sha256', $salt . $passw);   
         

 }
        else
      {
         $passw=$_POST['old_pass'];
      }
      $sql = "UPDATE travellers SET name='".$_POST['val-username']."',
    email='".$_POST['val-email']."',
    password='".$passw."',
    state_name='".$_POST['state_name']."',
    mobile='".$_POST['val-digits']."',
    address='".$_POST['val-suggestions']."',
    photo='".$file_name."'
     WHERE id='".$_GET['edit_id']."'";
    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    $_SESSION['success']=' Record Updated Successfully......';
     // $_SESSION['reply'] = "Added Successfully";
        header("location:../traveller_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM travellers WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
             $_SESSION['success']=' Record Successfully Deleted';
            // echo "Record deleted successfully";
            //  $_SESSION['reply'] = "Record deleted successfully";
        header("location:../traveller_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


  echo "string";  exit;

$conn = null;
?>
 
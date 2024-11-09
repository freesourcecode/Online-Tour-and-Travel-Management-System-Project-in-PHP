
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
         $file_name=$_FILES['img']['name'];
        $file_type=$_FILES['img']['type'];
        $file_size=$_FILES['img']['size'];
        $file_tem_loc=$_FILES['img']['tmp_name'];
        $file_store="../../admin/img/".$file_name;


        if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 

         $sql = "INSERT INTO demo(photo)
            VALUES ('".$file_name."')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../traveller_details.php");
    }
    if(isset($_POST['update']))
         
    {
         {
        $photo=$_FILES['photo']['name'];
        $file_type=$_FILES['photo']['type'];
        $file_size=$_FILES['photo']['size'];
        $file_tem_loc=$_FILES['photo']['tmp_name'];
        $file_store="../../admin/img/".$photo;
           

        if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 
          
      }
     

        {
        $docs=$_FILES['docs']['name'];
        $file_type=$_FILES['docs']['type'];
        $file_size=$_FILES['docs']['size'];
        $file_tem_loc=$_FILES['docs']['tmp_name'];
        $file_store="../../admin/img/".$docs;


        if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 
         
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

         $folder1="../../admin/img/";

     if(is_dir($folder1))
     {
        if($open=opendir($folder1))

            while(($docs=readdir($open)) !=false)
            {
                if($docs=='.'|| $docs=="..") continue;

                echo '<img src="../../admin/img/'.$docs.'" width="150" height="150">';
            }
             closedir($open);
     }


        $sql = "UPDATE travellers SET name='".$_POST['val-username']."',
    email='".$_POST['val-email']."',
    password='".$_POST['val-password']."',
    state_name='".$_POST['state_name']."',
    mobile='".$_POST['val-digits']."',
    address='".$_POST['val-suggestions']."',
    photo='".$photo."',
    docs='".$docs."'
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['reply'] = "Added Successfully";
        header("location:../traveller_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM travellers WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "Record deleted successfully";
            //  $_SESSION['reply'] = "Record deleted successfully";
        header("location:../traveller_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
 
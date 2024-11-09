<?php session_start();?>
<?php
include"../config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['btn_login']))
    {
        $sql = "INSERT INTO admin (uname, email, password,fname,lname,contact,address,file,cdate,group_id,total_amount,delete_status)
            VALUES ('".$_POST['uname']."', '".$_POST['email']."', '".$_POST['password']."','".$_POST['fname']."','".$_POST['lname']."' , '".$_POST['contact']."', '".$_POST['address']."', '".$_POST['file']."', '".$_POST['cdate']."','".$_POST['group_id']."', '".$_POST['total_amount']."', '".$_POST['delete_status']."')";
            // use exec() because no results are returned
            $conn->exec($sql);
             $_SESSION['success']=' Record Added Successfully.....';
            // echo "New record created successfully";
        //     $_SESSION['reply'] = "Added Successfully";
        // header("location:../admin.php");
    }


    if(isset($_POST['update']))
         
    {
        if($_FILES['file']['name']!='')
         {
        $file_name=$_FILES['file']['name'];
        $file_type=$_FILES['file']['type'];
        $file_size=$_FILES['file']['size'];
        $file_tem_loc=$_FILES['file']['tmp_name'];
        $file_store="../../admin/upload/".$file_name;


        if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 
      }

       else
      {
        $file_name=$_POST['old_img'];
       }
       
        $folder="../../admin/upload/";
    
        if(is_dir($folder))
         {
          if($open=opendir($folder))

           while(($file=readdir($open)) !=false)
          {
            if($file=='.'|| $file=="..") continue;
              
            echo '<img src="../../admin/upload/'.$file.'" width="150" height="150">';
          
          }
        
              closedir($open);
         }

     $sql = "UPDATE admin SET fname='".$_POST['fname']."',
    lname='".$_POST['lname']."',
    email='".$_POST['email']."',
    contact='".$_POST['contact']."',
    file='".$file_name."'
     WHERE id='".$_GET['id']."'";
 
    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
      $_SESSION['success']=' Record Updated Successfully......';
     // $_SESSION['reply'] = "Updated Successfully";
        header("location:../update_profile.php");
    }

    
  }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }





$conn = null;
?>

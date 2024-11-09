<?php session_start();?>
<?php
include"../config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['update']))
         
    {
        if($_FILES['img']['name']!='')
         {

        $file_name=$_FILES['img']['name'];
        $file_type=$_FILES['img']['type'];
        $file_size=$_FILES['img']['size'];
        $file_tem_loc=$_FILES['img']['tmp_name'];
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

           while(($img=readdir($open)) !=false)
          {
            if($img=='.'|| $img=="..") continue;
              
            echo '<img src="../../admin/img/'.$img.'" width="150" height="150">';
          
          }
        
              closedir($open);
         }

     $sql = "UPDATE travellers SET name='".$_POST['name']."',
    state_name='".$_POST['state_name']."',
    mobile='".$_POST['mobile']."',
    address='".$_POST['address']."',
    photo='".$file_name."'
     WHERE id='".$_GET['id']."'";
 //    echo "<pre>";print_r($sql);exit;
 
    // Prepare statement
    $stmt = $conn->prepare($sql);
       
    // execute the query
    $stmt->execute();
     // echo "<pre>"; print_r($stmt);exit;
      $_SESSION['success']=' Record Updated Successfully......';
        header("location:../update_profile.php");
    }

    
  }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }





$conn = null;
?>

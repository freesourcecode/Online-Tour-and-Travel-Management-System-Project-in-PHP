<?php
require_once('../check_login.php');
?>
<?php
include"../config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    if(isset($_POST['update']))
         
    {

         {
        $f_image=$_FILES['f_image']['name'];
        $file_type=$_FILES['f_image']['type'];
        $file_size=$_FILES['f_image']['size'];
        $file_tem_loc=$_FILES['f_image']['tmp_name'];
        $file_store="../../admin/settings/".$f_image;
           

        if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 
          
      }
     

        {
        $logo_image=$_FILES['logo_image']['name'];
        $file_type=$_FILES['logo_image']['type'];
        $file_size=$_FILES['logo_image']['size'];
        $file_tem_loc=$_FILES['logo_image']['tmp_name'];
        $file_store="../../admin/settings/".$logo_image;


        if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 
         
      }
    

        {
        $login_image=$_FILES['login_image']['name'];
        $file_type=$_FILES['login_image']['type'];
        $file_size=$_FILES['login_image']['size'];
        $file_tem_loc=$_FILES['login_image']['tmp_name'];
        $file_store="../../admin/settings/".$login_image;


        if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 
         
     }
    
    
       $sql = "UPDATE settings SET title='".$_POST['title']."',
     f_image='".$f_image."',
     logo_image='".$logo_image."',
     login_image='".$login_image."',
     currency='".$_POST['currency']."',
     footer='".$_POST['footer']."'
     WHERE id='".$_GET['id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    // execute the query
    $stmt->execute();
  
  
     $_SESSION['reply'] = "Updated Successfully";
        header("location:../settings.php");
    }
  
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>
<?php
  $folder="../../admin/settings/";

     if(is_dir($folder))
     {
        if($open=opendir($folder))

            while(($f_image=readdir($open)) !=false)
            {
                if($f_image=='.'|| $f_image=="..") continue;

                echo '<img src="../../admin/settings/'.$f_image.'" width="150" height="150">';
            }
             closedir($open);
     }


      $folder1="../../admin/settings/";

     if(is_dir($folder1))
     {
        if($open=opendir($folder1))

            while(($logo_image=readdir($open)) !=false)
            {
                if($logo_image=='.'|| $logo_image=="..") continue;

                echo '<img src="../../admin/settings/'.$logo_image.'" width="150" height="150">';
            }
             closedir($open);
     }

       $folder2="../../admin/settings/";

     if(is_dir($folder2))
     {
        if($open=opendir($folder2))

            while(($logo_image=readdir($open)) !=false)
            {
                if($logo_image=='.'|| $logo_image=="..") continue;

                echo '<img src="../../admin/settings/'.$logo_image.'" width="150" height="150">';
            }
             closedir($open);
     }
     ?>
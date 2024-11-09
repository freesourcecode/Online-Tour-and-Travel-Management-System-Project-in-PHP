<?php
     if (isset($_POST['submit']))
      {
      	$file_name=$_FILES['file']['name'];
      	$file_type=$_FILES['file']['type'];
      	$file_size=$_FILES['file']['size'];
      	$file_tem_loc=$_FILES['file']['tmp_name'];
      	$file_store="../admin/upload/".$file_name;


      	if (move_uploaded_file($file_tem_loc, $file_store)){

      		echo "File Uploaded Successfully";
      	} 

      }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Uploading File</title>
</head>
<body>
       <form method="post" enctype="multipart/form-data">
       	<label>Uploading Files</label><br>
       	<input type="file" name="file"><br><br>
       	<input type="submit" name="submit" value="Upload Image">
       </form>
</body>
</html>

<?php
     $folder="../admin/upload/";

     if(is_dir($folder))
     {
     	if($open=opendir($folder))

     		while(($file=readdir($open)) !=false)
     		{
     			if($file=='.'|| $file=="..") continue;

     			echo '<img src="../admin/upload/'.$file.'" width="150" height="150">';
     		}
     		 closedir($open);
     }

?>



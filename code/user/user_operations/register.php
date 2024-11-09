
            
<?php
include"config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    if(isset($_POST['submit']))
       
    {
         echo $sql = "INSERT INTO register (uname, email, password, contact)
     VALUES ('".$_POST['uname']."','".$_POST['email']."','".$_POST['password']."','".$_POST['contact']."')";

            $conn->exec($sql);
             echo "string"; exit;
            echo "New record created successfully";
            $_SESSION['reply'] = "Added Successfully";
        header("location:../page_register.php");
    }
    
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?> 
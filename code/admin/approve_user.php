<?php
require_once('check_login.php');
?>
<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php"?>
<?php
 include('config.php');
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

     if(isset($_GET['id']))      
    {
       $id=$_GET['id'];
      $stmt = $conn->prepare("select * from travellers where id='".$_GET['id']."'"); 
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "UPDATE travellers SET status='Activate'
      WHERE id='".$_GET['id']."'";
        


    $stmt = $conn->prepare($sql);


    $stmt->execute();
     $_SESSION['success']=' Traveller Activated Successfully......';


    ?>
    <script type="text/javascript">
      window.location="approveuser_entry.php"
    </script>
    <?php
    }
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
 
    }

$conn = null;
?>


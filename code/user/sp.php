<?php 
session_start();
?>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = $conn->prepare("SELECT * FROM travellers where email='".$_SESSION['email']."'"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    $data=$stmt->fetchAll();
   // echo "string"; print_r($data);
   
    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
<?php
 foreach ($data as $value) { 

    echo $value['name'];
    echo $value['state_name'];
}
?>
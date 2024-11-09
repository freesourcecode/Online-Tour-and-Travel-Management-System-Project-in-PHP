<?php
$user_stmt = $conn->prepare("select mobile from travellers where id='".$_POST['traveller_id']."'"); 
              $user_stmt->execute();
              $row_user=$user_stmt->fetch(PDO::FETCH_ASSOC);

              $sms_stmt = $conn->prepare("select * from sms_setting where id='1'"); 
              $sms_stmt->execute();
              $row_sms=$sms_stmt->fetch(PDO::FETCH_ASSOC);
            $uname=$row_sms['uname'];
            $password=$row_sms['password'];
            $sender_id=$row_sms['sender_id'];
            $msg="Your Password is successfully Change...";
            echo "$msg";exit;
            $message=urlencode($msg);
            $url="http://msg.demo.com/api/mt/SendSMS?user=".$uname."&password=".$password."&senderid=".$sender_id."&channel=Trans&DCS=0&flashsms=0&number=91".$row_user['mobile']."&text=".$message." &route=21";
            $response=file_get_contents($url);

 ?>
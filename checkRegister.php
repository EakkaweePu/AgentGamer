<?php 
    session_start();
    include 'conDB.php';

 print_r($_POST);
 $fullname = $_POST['fullname'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 $address = $_POST['address'];
 

//  echo 'username = ' . $username . '<br>' . "password = " . $password . '<br>' ;
 $sql = "SELECT * FROM tbl_users WHERE userEmail = '{$email}' ;";

// //  echo $sql . '<br>';
 $res = $con->query($sql);
//  print_r($res);
 $count_row = mysqli_num_rows($res);
 echo "<br>" . $count_row . "<br>";

 if($count_row >= 1){
    // echo "อีเมลนี้ถูกสมัครไปแล้ว";
    header("location:register.php?error=1");
    
 }else{
    // echo "สามารถใช้อีเมลนี้ได้";
    $sql = "INSERT INTO tbl_users (userFullname, userEmail, userPassword, userPhone, userAddress, userPic, role, userStatus)
    VALUES ('{$fullname}', '{$email}', '{$password}', '{$phone}', '{$address}', 'proicon.jpg','user','Y');";
    $res = $con->query($sql);
    
      // echo "adduser not is set";
      header("Location:index.php");
   
    
 }

?>
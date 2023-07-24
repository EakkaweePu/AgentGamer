<?php 
   session_start();
    include 'conDB.php';

 $email = $_POST['email'];
 $password = $_POST['password'];

//  echo 'username = ' . $username . '<br>' . "password = " . $password . '<br>' ;
 $sql = "SELECT * FROM `tbl_users` WHERE userEmail = '{$email}' AND userPassword = '{$password}';";

//  echo $sql . '<br>';
 $res = $con->query($sql);
//  print_r($res);
 $count_row = mysqli_num_rows($res);

 if($count_row == 1){
   //  echo "found";
    $result = $res->fetch_assoc();
    
    $_SESSION['userID'] =  $result['userID'];
    $_SESSION['role'] =  $result['role'];

    echo $_SESSION['userID'];
    echo $_SESSION['role'];
    
    header("Location:index.php");
    
 }
 else{
    echo "not found";
    header("location:loging.php?error=1");
 }

?>
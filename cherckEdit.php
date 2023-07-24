<?php 
    session_start();
    include 'conDB.php';
    
echo '<pre>';
print_r($_POST);
echo '</pre>';
// $id =  $_POST['id'];
$userID = "";
if(isset($_POST['id'])){
  // echo $_GET['uid'];
  $userID = $_POST['id'];
}
elseif(isset($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
}
$fullname =  $_POST['fullname'];
$phone =  $_POST['phone'];
$email =  $_POST['email'];
$address =  $_POST['address'];
$upload=$_FILES['fileupload'];

$sql = "SELECT userPic FROM tbl_users where userID = {$userID};";
$resUser = $con->query($sql);
$result = $resUser->fetch_assoc();

  date_default_timezone_set('Asia/Bangkok');
  $date = date("Ymd");	
  $numrand = (mt_rand());


if($upload["error"] != 4) {   //not select file
  //โฟลเดอร์ที่จะ upload file เข้าไป 
  $path="img/";  
   
  //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
   $type = strrchr($_FILES['fileupload']['name'],".");
  
    
  //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
  $newname = $date.$numrand.$type;
  $path_copy=$path.$newname;
  $path_link="fileupload/".$newname;
   
  //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
  move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	
    }else{
      $newname = $result['userPic'];
      }

 

//echo $userID;


// if (isset($_SESSION['userID'])) {
//   $userID = $_SESSION['userID'];

$sql = "UPDATE tbl_users SET userFullname = '{$fullname}', userPhone = '{$phone}', userEmail = '{$email}' , userAddress = '{$address}', userPic = '{$newname}' WHERE userID = {$userID}; ";

//  print_r($res);
if ($con->query($sql)) {
    if(isset($_POST['id'])){
    // echo"<script language='javascript'> alert('Record updated successfully') </script>";
    // echo "update successfully";
    header("Location:showuser.php");
    }else{
    header("Location:profile.php");  
    }
    
  } else {
    // echo"<script language='javascript'> alert('Error updating record'. $conn->error;) </script>";
  }

?>


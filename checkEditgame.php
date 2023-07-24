<?php 
    session_start();
    include 'conDB.php';
    
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// $id =  $_POST['id'];


$id = $_POST['id'];
$name =  $_POST['name'];
$gamecate =  $_POST['gamecate'];
// $upload = empty($_FILES['fileupload']) ? null : $_FILES['fileupload'];
$upload = $_FILES['fileupload'];



$sql = "SELECT gamePic FROM tbl_game where gameID = {$id};";
$resGame = $con->query($sql);
$result = $resGame->fetch_assoc();
 
date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");	
$numrand = (mt_rand());

// if($upload["error"] != 4){
//     echo "upload";
//     print_r($upload["error"]);
// }else{
//     echo "not upload";
    
//     print_r($upload);
// }
// exit;
if($upload["error"] != 4){   //not select file
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
    $newname = $result['gamePic'];
     }

 
if(isset($_POST['id'])){
  // echo $_GET['uid'];
  $userID = $id;
}
// elseif(isset($_SESSION['userID'])) {
//   $userID = $_SESSION['userID'];
// }
//echo $userID;


// if (isset($_SESSION['userID'])) {
//   $userID = $_SESSION['userID'];

$sql = "UPDATE tbl_game SET gameName = '{$name}', gamePic = '{$newname}', gameCateID = {$gamecate}  WHERE gameID = {$id}; ";
// echo $sql;
//  print_r($res);
// exit;
if ($con->query($sql)) {
    
    // echo"<script language='javascript'> alert('Record updated successfully') </script>";
    // echo "update successfully";
    header("Location:showgame.php");
    
    
  } else {
    // echo"<script language='javascript'> alert('Error updating record'. $conn->error;) </script>";
  }

?>


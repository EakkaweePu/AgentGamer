<?php 
    session_start();
    include 'conDB.php';

 print_r($_POST);
 $name = $_POST['name'];
 $gamecate = $_POST['gamecate'];
 $upload = $_FILES['fileupload'];
//  print_r($upload);
//  exit;
 

 date_default_timezone_set('Asia/Bangkok');
  $date = date("Ymd");	
  $numrand = (mt_rand());

  if($upload["error"] != 4) {   //not select file
   //โฟลเดอร์ที่จะ upload file เข้าไป 
   $path="img/";  
    
   //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
    $type = strrchr($_FILES['fileupload']['name'],".");
   //  echo $type;
   //  exit;
   //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
   $newname = $date.$numrand.$type;
   $path_copy=$path.$newname;
   $path_link="fileupload/".$newname;
    
   //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
   move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	
   }else{
      $newname = 'gamepad.jpg';
   }


//  echo 'username = ' . $username . '<br>' . "password = " . $password . '<br>' ;
 $sql = "SELECT * FROM tbl_game WHERE gameName = '{$name}' ;";

//  echo $sql . '<br>';

 $res = $con->query($sql);
//  print_r($res);
 $count_row = mysqli_num_rows($res);
//  echo "<br>" . $count_row . "<br>";
 

 if($count_row >= 1){
    // echo "อีเมลนี้ถูกสมัครไปแล้ว";
    header("location:addgame.php?error=1");
    
 }else{
    // echo "สามารถใช้อีเมลนี้ได้";
    $sql = "INSERT INTO tbl_game (gameName, gamePic,  gameCateID , gameStatus)
    VALUES ('{$name}', '{$newname}',{$gamecate},'Y');";
    $res = $con->query($sql);
    
      // echo "adduser not is set";
      header("Location:showgame.php");
   
    
 }

?>
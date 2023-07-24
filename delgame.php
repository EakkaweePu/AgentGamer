<?php 
    session_start();
    include 'conDB.php';
    
//     echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// $id =  $_POST['id'];

// $id = $_POST['id'];
// $fullname =  $_POST['fullname'];
// $phone =  $_POST['phone'];
// $email =  $_POST['email'];
// $address =  $_POST['address'];


if(isset($_GET['gid'])){
  // echo $_GET['uid'];
  $gameID = $_GET['gid'];
}
// elseif(isset($_SESSION['userID'])) {
//   $agentID = $_SESSION['userID'];
// }
//echo $userID;


// if (isset($_SESSION['userID'])) {
//   $userID = $_SESSION['userID'];

$sql = "UPDATE tbl_game SET gameStatus = 'N' WHERE gameID = {$gameID}; ";

//  print_r($res);
if ($con->query($sql)) {
    // echo"<script language='javascript'> alert('Record updated successfully') </script>";
    // echo "update successfully";
    header("Location:showgame.php");
    
  } else {
    // echo"<script language='javascript'> alert('Error updating record'. $conn->error;) </script>";
  }

?>
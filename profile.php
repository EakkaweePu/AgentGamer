<?php
session_start();

include 'conDB.php';
$userID = "";
if(isset($_GET['uid'])){
  // echo $_GET['uid'];
  $userID = $_GET['uid'];
}
elseif(isset($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
}else{
    header('Location:login.php');
}
$sql = "SELECT * FROM tbl_users where userID =  {$userID} ";
            // echo $sql;
  $res = $con->query($sql);
            $count_row = mysqli_num_rows($res);
            if($count_row == 1){
              //  echo "found";
            $result1 = $res->fetch_assoc();
              //  print_r($result);
            }

  

?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agent Gamer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
</head>
</head>

<body class="bg-dark">
  <?php 
  include 'navbar.php';
?>


  <div class="container">
    <div class="d-flex gap-3 justify-content-center align-items-center mt-3" style="min-height:64vh ;">
      <div class="">
        <img src="img/<?php echo $result1['userPic'];?>" 
        class="img-fluid w-100 img" 
        alt="">
      </div>
      <div >
        <h2 class='mb-4'><?php echo $result1['userFullname']?></h2>
        <h6 class="mb-4 "><i class="fa-sharp fa-solid fa-message me-2"></i>
          <?php
          echo $result1['userEmail'];
          ?>
        </h6>
        <h6 class="mb-4 "><i class="fa-solid fa-phone me-2"></i>
          <?php
          echo $result1['userPhone'];
          ?>
        </h6>
        <h6 class="mb-4"><i class="fa-solid fa-location-dot me-2 "></i>
          <?php
          echo $result1['userAddress'];
          ?>
        </h6>
        <div class="d-flex">
          <?php
              if(isset($_GET['uid'])){
              ?>
                <a  class="btn btn-outline-warning me-2 text-white" 
          href="editprofile.php?uid=<?php echo $result1['userID']?>">แก้ไขโปรไฟล์</a>
              <?php
                }else{
              ?>
              <a  class="btn btn-outline-warning me-2 text-white" 
              href="editprofile.php">แก้ไขโปรไฟล์</a>
              <?php
                }
              ?>

            
         
          <!-- <a  class="btn btn-outline-warning me-2 text-white" 
          href="editprofile.php">แก้ไขโปรไฟล์</a> -->

        </div>
      </div>
    </div>
  </div>
  




  <footer class="mt-4 d-none d-lg-block">
    <div class="container">
      <div class="row py-3">
        <div class="col-4">
          <a class="navbar-brand text-white" href="#">Agent Gamer</a>
        </div>
        <div class="col-4">
          <div class="title-footer">
            <h6>บริการลูกค้า</h6>
          </div>
          <ul class="p-0">
            <li><a href="#">แจ้งปัญหา</a></li>
            <li><a href="#">วิธีการใช้</a></li>
          </ul>
        </div>
        <div class="col-4">
          <div class="title-footer">
            <h6>ติดต่อลูกค้า</h6>
          </div>
          <ul class="p-0">
            <li><a href="#"><i class="fa-brands fa-facebook me-2"></i>Agent Gamer</a></li>
            <li><a href="#"><i class="fa-sharp fa-solid fa-message me-2"></i>Agent.gamer@gmail.com</a></li>
            <li><a href="#"><i class="fa-solid fa-phone me-2"></i>099-9999999</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

<?php



?>
</html>
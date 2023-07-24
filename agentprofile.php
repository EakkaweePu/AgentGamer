<?php

session_start();
include 'conDB.php';
$aid = "";
if (isset($_GET['agid'])) {
  $aid = $_GET['agid'];
} elseif (isset($_GET['aid'])) {

  $aid = $_GET['aid'];
}



$sqlAgent = "SELECT *  FROM tbl_agents  
   where agentID = {$aid} ";

// echo $sqlAgent;

$resAgent = $con->query($sqlAgent);
// print_r($resAgent);
// $count_Agent = mysqli_num_rows($resAgent);
// echo $count_Agent;


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
  <?php include 'navbar.php'; ?>


  <div class="container ">
    <div class="d-flex gap-3 justify-content-center align-items-center mt-3" style="min-height:64vh ;">
      <?php $result = $resAgent->fetch_assoc();
      // print_r($result);
      ?>
      <div class="">
        <img src="img/<?php echo $result['agentPic']; ?>" class="img-fluid w-100 img " alt="">
      </div>
      <div>
        <h2 class="mb-4"><?php echo $result['agentFullname']; ?></h2>
        <?php
          if (isset($_GET['agid'])) {
          ?>
          
        <h6 class="mb-4 "><i class="fa-sharp fa-solid fa-message me-2"></i>
          <?php
          echo $result['agentEmail'];
          ?>
        </h6>
        <h6 class="mb-4 "><i class="fa-solid fa-phone me-2"></i>
          <?php
          echo $result['agentPhone'];
          ?>
        </h6>
        <h6 class="mb-4"><i class="fa-solid fa-location-dot me-2 "></i>
          <?php
          echo $result['agentAddress'];
          ?>
        </h6>
        <?php
                }else{
              ?>
        <h6 class="mb-4"><i class="fa-solid fa-circle text-success me-2"></i>online</h6>
        <!-- <h6 class="mb-4"><i class="fa-solid fa-heart me-2 text-danger"></i> 6 like</h6> -->
        <h6 class="mb-4"><i class="fa-solid fa-location-dot me-2 text-primary"></i><?php echo $result['agentAddress']; ?></h6>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore perferendis repudiandae ab facilis similique, dignissimos qui voluptatibus blanditiis in vitae dolores, consequatur nihil corporis fugit pariatur? Cupiditate ducimus suscipit dolores!</p> -->
        <?php
                }
              ?>
        <div class="d-flex">
          <?php
          if (isset($_GET['agid'])) {
          ?>
            <a class="btn btn-outline-warning me-2 text-white" href="editagent.php?aid=<?php echo $result['agentID'] ?>">แก้ไขโปรไฟล์</a>
          <?php
          } else {
          ?>
            <!-- <a class="btn btn-outline-danger me-2 text-white" href="#"><i class="fa-solid fa-heart me-2 "></i></i>ถูกใจ</a> -->
            <a class="btn btn-outline-primary me-2 text-white" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-sharp fa-solid fa-message me-2"></i>ติดต่อ</a>
            <!-- <a class="btn btn-outline-warning me-2 text-white" href="#"><i class="fa-solid fa-flag me-2"></i>รายงานผู้กลาง</a> -->
          <?php

          }
          ?>
        </div>
        <?php //include'formMessage.php' 
        ?>
      </div>
    </div>


    <!-- Button trigger modal -->


    <!-- Modal -->
    <?php include 'formMes.php' ?>
  </div>

  <?php include 'footer.php' ?>

  <?php

  ?>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>
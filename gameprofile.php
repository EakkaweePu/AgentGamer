<?php

session_start();
include 'conDB.php';
$gid = "";
if (isset($_GET['gid'])) {
  $gid = $_GET['gid'];
} 
// echo $gid;


 $sqlGame = "SELECT g.gameID, g.gameName , c.gameCateName, g.gamePic
    FROM tbl_game as g
    INNER JOIN tbl_gameCategory as c ON g.gameCateID = c.gameCateID 
    where g.gameID = {$gid}";
    // echo  $sqlGame;
// echo $sqlAgent;

$resGame = $con->query($sqlGame);
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
      <?php $result = $resGame->fetch_assoc();
      // print_r($result);
      ?>
      <div class="">
        <img src="img/<?php echo $result['gamePic']; ?>" class="img-fluid w-100 img " alt="">
      </div>
      <div>
        <h2 class="mb-4"><?php echo $result['gameName']; ?></h2>
          
        <h6 class="mb-4 "><?php echo $result['gameCateName'];?></h6> 
        
        <div class="d-flex">
            <a class="btn btn-outline-warning me-2 text-white" href="editgame.php?gid=<?php echo $result['gameID'] ?>">แก้ไขโปรไฟล์</a>
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
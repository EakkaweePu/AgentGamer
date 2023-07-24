<?php
  session_start();
  if($_SESSION['role'] =='admin'){
  include 'conDB.php';
  $sql = "SELECT * FROM tbl_users WHERE role = 'user' and userStatus = 'y';";
  $res = $con->query($sql);
  $count_user = mysqli_num_rows($res);
  // echo $count_user . "<br>";

  $sql = "SELECT * FROM tbl_agents WHERE   agentStatus = 'y';";
  $res = $con->query($sql);
  $count_agent = mysqli_num_rows($res);
  // echo $count_agent . "<br>";

  $sql = "SELECT * FROM tbl_game ";
  $res = $con->query($sql);
  $count_game = mysqli_num_rows($res);
  // echo $count_game . "<br>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Gamer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark">
  <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row mt-4">
          <?php 
            $boxes = [
              ["count"=>$count_user,"title"=>"user", "icon"=>"fa-solid fa-user","link"=>"showuser.php"],
              ["count"=>$count_agent,"title"=>"agent", "icon"=>"fa-solid fa-user-tie","link"=>"showagent.php"],
              ["count"=>$count_game,"title"=>"game", "icon"=>"fa-solid fa-gamepad","link"=>"showgame.php"]
            ];
            foreach($boxes as $box){
              echo "
              <div class='col-lg-4'>
              <div class='card boxAgent'>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-8'>
                        <h1>{$box["count"]}</h1>
                        <p class='mb-0'>{$box["title"]}</p>
                      </div>
                      <div class='col-4 d-flex justify-content-center align-items-center'> 
                        <i class='{$box["icon"]} me-2 fs-1'></i>
                      </div>
                    </div>
                    
                  </div>
                  <div class='card-footer bg-transparent border-white text-end'>
                      <a href='{$box["link"]}' class='btn btn-primary'>Manage</a>
                  </div>
                </div>
            </div>
              ";
            }
          ?>
            
            
          
            
            
          </div>



    </div>
    <?php
    }else{
      header('Location:loging.php');
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
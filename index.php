<?php
  
  session_start();
  include 'conDB.php';


  $sqlFps = "SELECT *
  FROM tbl_game
  INNER JOIN tbl_gamecategory
  ON tbl_game.gameCateID =  tbl_gamecategory.gameCateID
  where tbl_gamecategory.gameCateName = 'FPS' and tbl_game.gameStatus = 'Y';" ;
  
  $resFps = $con->query($sqlFps);
  //  print_r($res);
  $count_Fps = mysqli_num_rows($resFps);
  // echo $count_Fps;

  $sqlMb = "SELECT *
  FROM tbl_game
  INNER JOIN tbl_gamecategory
  ON tbl_game.gameCateID =  tbl_gamecategory.gameCateID
  where tbl_gamecategory.gameCateName = 'Moba' and tbl_game.gameStatus = 'Y';";

  $resMb = $con->query($sqlMb);
  $count_Mb = mysqli_num_rows($resMb);
  // echo $count_Mb;
  
  



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


    <div class="container">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/ban1comp.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/ban2comp.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/ban3comp.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <!-- <img class="img-fluid w-100 mt-2" src="" alt=""> -->

        <div class="row mt-2 d-none d-lg-flex">
            <div class="col-6 pe-1">
                <img src="img/garanty.jpg" class="img-fluid w-100" alt="">
            </div>
            <div class="col-6 ps-1">
              <img src="img/waranty.jpg" class="img-fluid w-100" alt="">
            </div>
        </div>  
  
     <div class="title mt-5">
     <h3>Fps</h3>
     </div>
              <div class="row mt-4 mx-auto g-2">
              <?php 
          while($result = $resFps->fetch_assoc()){
            // print_r($result)
          ?>  
              <div class="boxgame col-4" >
                  <img class="img-fluid"  src="img/<?php echo $result['gamePic']  ?>" 
                alt="">
                <a href="agent.php?gid=<?php echo $result['gameID']?>&gname=<?php echo $result['gameName']?>" class="py-1"><?php echo $result['gameName']  ?></a>
                </div>
                  
                <?php
          }
          ?>
              </div>
            
          
      <div class="title mt-5">
     <h3>Moba</h3>
     </div>
              <div class="row mt-4  g-2">
              <?php 
          while($result = $resMb->fetch_assoc()){
            // print_r($result)
          ?>    
              <div class="col-4 boxgame ">
                  <img class="img-fluid"  src="img/<?php echo $result['gamePic']?>" 
                alt="">
                <a href="agent.php?gid=<?php echo $result['gameID']?>&gname=<?php echo $result['gameName']?>" class="py-1"><?php echo $result['gameName']  ?></a>
              </div>
          <?php
          }
          ?>
      </div>
    
    
    
    </div>
        
        
     
     
        <!-- <div class="title mt-5">
          <h3>FPS</h3>
        </div>
            <a href="/agent/agent.html">
              <div class="d-flex flex-wrap justify-content-center  justify-content-lg-start mt-4">
                <div class="boxgame" >
                  <img class="img-fluid"  src="img/Valorant-cross-play-747x420.jpg" 
                alt="">
                <a href="/agent/agent.html" class="py-1">valorant</a>
                </div>
                
              </div>
            </a> -->

            <!-- <div class="title mt-5">
              <h3>Moba</h3>
            </div>
                <div class="d-flex flex-wrap justify-content-center  justify-content-lg-start mt-4">
                  <div class="boxgame " >
                    <img class="img-fluid"  src="img/rov_thumnail_1.jpg" 
                  alt="">
                  <a href="#" class="py-1">Rov</a>
                  </div>
                  <div class="boxgame mt-2 mt-lg-0" >
                    <img class="img-fluid"  src="img/lol.jpg" 
                  alt="">
                  <a href="#" class="py-1">league of legends</a>
                  </div>
                </div> -->
    

    <?php  include'footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  </body>
</html>
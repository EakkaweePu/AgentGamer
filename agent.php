<?php
  session_start();
  include 'conDB.php';

  $gid = $_GET['gid'];
  $gname = $_GET['gname'];
  

  $sqlAgent = "SELECT agentFullname ,agentPic ,agentID  FROM tbl_agents  
   where gameID = {$gid} and agentStatus = 'Y'";
  
  // echo $sqlAgent;

  $resAgent = $con->query($sqlAgent);
  //  print_r($res);
  // $count_Agent = mysqli_num_rows($resAgent);
  // echo $count_Agent;




 
  //  print_r($resultGame);
  // $count_Game = mysqli_num_rows($resGame);
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


    <div class="container" style="min-height: 64vh;">
        
   
    
     <div class="title my-4">
     <h3><?php echo $gname; ?></h3>
     </div>
            <div class="row g-2">
            <?php 
              while($result = $resAgent->fetch_assoc()){
                // print_r($result)
            ?>
              <div class="col-lg-3">
                <div class="p-3  boxAgent ">
                <div class="text-center">
                    <img src="img/<?php echo $result['agentPic'] ?>" class="img-fluid img" alt="">
                    <h6 class="mt-2"><?php echo $result['agentFullname'] ?></h6>
                </div>
                <div class="d-flex justify-content-center">
                      <a class='btn btn-outline-primary me-2 text-white' href='agentprofile.php?aid=<?php echo $result['agentID'] ?>' role='button'><i class="fa-solid fa-user me-2"></i>โปรไฟล์</a>
                      <?php include 'formMes.php' ?>
                      <a class="btn btn-outline-primary me-2 text-white" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-sharp fa-solid fa-message me-2"></i>ติดต่อ</a>
                  </div>
                  </div>
              </div> 
              <!-- <div class="col-lg-3">
                <div class="p-3  boxAgent ">
                  <div class="text-center">
                    <img src="img/p1.jpg" class="img-fluid img" alt="">
                    <h6 class="mt-2">eakkawee Puangbuppha</h6>
                  </div>
                  <div class="d-flex justify-content-center">
                      <a class='btn btn-outline-primary me-2' href='loging.php' role='button'>โปรไฟล์</a>
                      <a class='btn btn-outline-primary me-2' href='loging.php' role='button'>ติดต่อ</a>
                  </div>
                </div>
              </div> -->
              <?php
              }
              ?>
              
              
            </div>
            
                
             
            
          
      
             
    <!-- Modal -->
    <?php include 'formMes.php' ?>
    
    
    </div>
    <?php  include'footer.php' ?>
          

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  </body>
</html>
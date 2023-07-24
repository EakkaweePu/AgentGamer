<?php
session_start();
include 'conDB.php';



$error_message = "";
if(isset($_GET['error'])){
  $error = $_GET['error'];

  if($error = 1){
    $error_message = "this game has already been added";
  }
}

$sql = "SELECT * FROM tbl_gamecategory";
$resCate = $con->query($sql);

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
  <?php include 'navbar.php'  ?>

  <div class="container" style="min-height: 62vh;">
    <div class="text-white">
      <h2 class="text-center my-4">เพิ่มข้อมูลเกม</h2>
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-5">
          <form class="mx-auto" method="POST" action="checkaddgame.php" enctype="multipart/form-data">
          <div class=" mb-3">
              <label for="name" class="form-label">ชื่อเกม</label>
              <input type="text" class="form-control rounded-radius loginform" name="name" id="name" placeholder="ชื่อเกม">
            </div>  
          
            <?php
                  echo"<p class='text-danger' >{$error_message}</p>"
            ?>
            <div class=" mb-3">
              <label for="gamecate" class="form-label">ประเภทเกม</label>
              <select id="gamecate" class="form-select loginform" name="gamecate">
                <?php
                if ($count_row != 0) {
                  while ($rsCate = $resCate->fetch_assoc()) {
                    
                ?>
                    <option value=" <?php echo $rsCate['gameCateID'];    ?>" 
                    <?php
                    // if($rsCate['gameCateID'] == $result1['gameCateID']){
                    //   echo"selected";
                    // }
                    ?>
                    ><?php echo $rsCate['gameCateName']; ?>
                    </option>

                <?php
                  }
                }

                ?>

              </select>
            </div>
            

            <div class="mb-3">
                <label for="detail" class="form-label">อัพโหลดรูปโปรไฟล์</label>
                <input class="form-control rounded-radius loginform" type="file" name="fileupload" value="" />
            </div>


            <div class="text-center">
              <button type="submit" class="btn btn-primary">ยืนยัน</button>
            </div>
          </form>
        </div>
      </div>
    </div>


  </div>




  <?php include 'footer.php' ?>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();
include 'conDB.php';
if (isset($_GET['aid'])) {
  // echo $_GET['uid'];
  $agentID = $_GET['aid'];
}
// elseif(isset($_SESSION['userID'])) {
//   $userID = $_SESSION['userID'];
// }
// echo $userID;
$sql = "SELECT * FROM tbl_agents where agentID =  {$agentID} ";


//  echo $sql . '<br>';
$res = $con->query($sql);
//  print_r($res);
$count_row = mysqli_num_rows($res);

if ($count_row == 1) {
  // echo "found";
  $result1 = $res->fetch_assoc();
  // header("Location:profile/john.php?userid={$result['user_id']}");
}

$sql = "SELECT * FROM `tbl_game`";
$resGame = $con->query($sql);


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

    <div class="text-white">
      <h2 class="text-center mb-4">โปรไฟล์</h2>

      <div class="text-center">
        <img src="img/<?php echo $result1['agentPic']; ?>"  class="mb-3 img" alt="">
        <!-- <div>
                  <button type="" class="btn btn-outline-primary">อัพโหลดรูปโปรไฟล์</button>
                </div> -->
      </div>


      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-5">
          <form action="checkeEditagent.php" method="post" enctype="multipart/form-data" class="mx-auto">
            <div class="mb-3 ">
              <div class="mb-3">
                <input type="hidden" class="form-control rounded-radius loginform" name="id" id="id" placeholder="" value="<?php echo $result1['agentID']; ?>">
              </div>
              <label for="fname" class="form-label">ชื่อ - นามสกุล</label>
              <input type="text" class="form-control rounded-radius loginform" name="fullname" id="fullname" placeholder="ชื่อ" value="<?php echo $result1['agentFullname']; ?>">
            </div>


            <div class="mb-3">
              <label for="email" class="form-label">อีเมล</label>
              <input type="email" class="form-control rounded-radius loginform" name="email" id="email" placeholder="อีเมล์" value="<?php echo $result1['agentEmail']; ?>">
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
              <input type="text" class="form-control rounded-radius loginform" name="phone" id="phone" placeholder="เบอร์โทรศัพท์" value="<?php echo $result1['agentPhone']; ?>">
            </div>

            <div class=" mb-3">
              <label for="gamecate" class="form-label">ผู้กลางเกม</label>
              <select id="gamecate" class="form-select loginform" name="gamecate">
                <?php
                if ($count_row != 0) {
                  while ($rsGame = $resGame->fetch_assoc()) {
                ?>
                    <option value=" <?php echo $rsGame['gameID'];    ?>" 
                    <?php
                    if($rsGame['gameID'] == $result1['gameID']){
                      echo"selected";
                    }
                    ?>
                    ><?php echo $rsGame['gameName']; ?>
                    </option>

                <?php
                  }
                }

                ?>

              </select>
            </div>

            <div class="mb-3">
              <label for="detail" class="form-label ">ที่อยู่</label>
              <textarea style="resize: none;" class="form-control loginform" name="address" id="address" rows="5"><?php echo $result1['agentAddress']; ?></textarea>
            </div>



            <div class="mb-3">
              <label for="detail" class="form-label">อัพโหลดรูปโปรไฟล์</label>
              <input class="form-control rounded-radius loginform" type="file" name="fileupload" value="" />
            </div>

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-primary me-2 text-white">ยืนยัน</button>
              <a class="btn btn-outline-primary me-2 text-white" href="profile.php">ยกเลิก</a>
            </div>
          </form>
        </div>
      </div>
    </div>



  </div>





  <?php include 'footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>
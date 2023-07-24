<?php
$error_message = "";
if(isset($_GET['error'])){
  $error = $_GET['error'];

  if($error = 1){
    $error_message = "this email has already been registered";
  }
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
  <?php include 'navbar.php'  ?>

  <div class="container ">
    <div class="text-white">
      <h2 class="text-center my-4">สมัครสมาชิก</h2>
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-5">
          <form class="mx-auto" method="POST" action="checkRegister.php">
            <div class="mb-3">
              <label for="email" class="form-label">อีเมล์</label>
              <input type="email" class="form-control rounded-radius loginform" name="email" id="email" placeholder="อีเมล์">
            </div>
            <?php
                  echo"<p class='text-danger' >{$error_message}</p>"
            ?>

            <div class="mb-3">
              <label for="Password" class="form-label">รหัสผ่าน</label>
              <input type="password" class="form-control rounded-radius  loginform" name="password" id="Password" placeholder="รหัสผ่าน">
            </div>
            <div class=" mb-3">
              <label for="fullname" class="form-label">ชื่อ-นามสกุล</label>
              <input type="text" class="form-control rounded-radius loginform" name="fullname" id="fullname" placeholder="ชื่อ-นามสกุล">
            </div>
            <!-- <div class="mb-3">
              <label for="Password" class="form-label">ยืนยันรหัสผ่าน</label>
              <input type="password" class="form-control rounded-radius  loginform" id="Password" placeholder="รหัสผ่าน">
            </div> -->
            <div class="mb-3">
              <label for="phone" class="form-label">โทรศัพท์</label>
              <input type="tel" class="form-control rounded-radius loginform" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
            </div>

            <div class="mb-3">
              <label for="detail" class="form-label ">ที่อยู่</label>
              <textarea style="resize: none;" class="form-control loginform" name="address" id="address" rows="5"></textarea>
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
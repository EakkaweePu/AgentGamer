<?php
$error_message = "";
if(isset($_GET['error'])){
  $error = $_GET['error'];

  if($error = 1){
    $error_message = "Plese check username and password";
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

  <?php include 'navbar.php' ?>

    <div class="container d-flex justify-content-center align-items-center">
      <div class="mx-auto" style="margin: 85px 0; width: 500px;">
          <div class="text-white">
              <h2 class="text-center">เข้าสู่ระบบ</h2>
              <form method="post" action="checkLogin.php">
                  <div class="mb-3">
                    <label for="username" class="form-label">อีเมล์</label>
                    <input type="email" name="email" class="form-control rounded-radius loginform" id="email" placeholder="อีเมล">
                    
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" name="password" class="form-control rounded-radius  loginform" id="password"  placeholder="รหัสผ่าน">
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <div class="d-flex justify-content-between">
                      <label class="form-check-label" for="exampleCheck1">จดจำฉันไว้</label>
                      <a href="#">ลืมรหัสผ่าน?</a>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                </form>
                
                <?php
                  echo"<p class='text-danger' >{$error_message}</p>"
                ?>
                
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
</html>
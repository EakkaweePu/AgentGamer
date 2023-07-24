<nav >
      <div class="container d-flex py-3 justify-content-between align-items-center">
        <a class="navbar-brand text-white" href="index.php">Agent Gamer</a>
          <!-- <div class="d-flex bg-white align-items-center p-2 rounded-radius w-50">
           <form class="flex-grow-1">
              <input class="border-0 searchbar" type="text" placeholder="Search" >
           </form>
           <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
         </div> -->
         <div class="d-none d-lg-flex align-items-center">
         <?php
        //  $_SESSION['userID'] = 1;
          // unset($_SESSION['userID']);
          if(isset($_SESSION['userID'])){
            $userID = $_SESSION['userID'];
            $sql = "SELECT * FROM tbl_users where userID =  {$userID} ";
            // echo $sql;
            $res = $con->query($sql);
            $count_row = mysqli_num_rows($res);
            if($count_row == 1){
              //  echo "found";
            $result = $res->fetch_assoc();
              //  print_r($result);
            }
          
         ?>
         
         <div class="dropdown">
            <button class="btn btn-outline-primary me-2 text-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user me-2"></i><?php echo $result['userFullname']; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="profile.php">โปรไฟล์</a></li>
              <?php   
                if($_SESSION['role'] == 'admin'){
                  echo '<li><a class="dropdown-item" href="admin.php">Admin</a></li>';
                }
              ?>
              <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
            </ul>
          </div>
          <?php 
          }else{
            echo "<a class='btn btn-outline-primary me-2' href='loging.php' role='button'>เข้าสู่ระบบ</a>";
            echo "<a class='btn btn-outline-primary' href='register.php' role='button'>ลงทะเบียน</a>";
          }


            ?>
         </div> 
      </div>
  </nav>
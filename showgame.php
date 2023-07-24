<?php  
    session_start();
    include 'conDB.php';
    if($_SESSION['role'] =='admin'){

    // echo "<br>Total data: ". $count_row;
    // echo "<br>Page no. " . $n;
    // echo "<br>Start ". $start;
    // echo "<br>Number of pages: ". $numPages;

    /*
    select_list
    FROM 
        table_name
    ORDER BY 
        sort_expression
    LIMIT offset, row_count;
    ex. select * from products limit 12, 3
    หมายความว่า ให้แสดงข้อมูลสินค้า ลำดับที่ 13 โดยแสดง 3 records
    */
//  echo 'username = ' . $username . '<br>' . "password = " . $password . '<br>' ;
 $sql = "SELECT * FROM `tbl_game`";

//  echo $sql . '<br>';
  $res = $con->query($sql);
  
//  print_r($res);
 $count_row = mysqli_num_rows($res);
 if(isset($_GET['n'])){
  $n = $_GET['n'];
}else{
  $n=1;
}

  $itemsPerPage = 10;
  $numPages = ceil($count_row/$itemsPerPage);
  $start =($n - 1) * $itemsPerPage;
//  echo $count_row;
// echo "<br>Total data: ". $count_row;
    // echo "<br>Page no. " . $n;
    // echo "<br>Start ". $start;
    // echo "<br>Number of pages: ". $numPages;

    $sql2 = "SELECT g.gameID, g.gameName , c.gameCateName, g.gamePic
    FROM tbl_game as g
    INNER JOIN tbl_gameCategory as c ON g.gameCateID = c.gameCateID where g.gameStatus = 'Y' limit {$start},  {$itemsPerPage}";
    //echo $sql2;
    $result2 = $con->query($sql2);
    //echo $count_row;
    
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--<script src="js/script.js"></script>-->
    <link rel="stylesheet" href="style.css">

    <script>
    $(document).ready(function() {
        $("#game").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#userTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

</head>
<body class="bg-dark">
<?php include 'navbar.php' ?>
<div class="container">

<?php 
    if($count_row>0){
    
    ?>
<div class="row justify-content-center">
  <div class="col-lg-9">
  <div class="title my-4">
     <h3>agent management</h3>
</div>

<div class="row justify-content-center">
          <form action="#" class="col-5 ">
          <div>
          <input type="text" class="form-control rounded-radius loginform"  id="game" placeholder="ค้นหา">
          </div>
          </form>
          
        </div>

  <div class="text-end">
          <a class="btn btn-success  text-white" href="addgame.php">add data</a>
  </div>
  <table class="table bg-table text-white table-bordered mt-4" id="gameTable">
  <thead>
    <tr class="text-center">
      <th scope="col">game ID</th>
      <th scope="col">game name</th>
      <th scope="col">category</th>
      <th scope="col">picture</th> 
      <th scope="col">Manage</th>
      
    </tr>
  </thead>
  <?php
    while($result = $result2->fetch_assoc()){
?>
  <tbody>
    <tr>
      <th class="text-center"><?php echo $result['gameID']; ?></th>
      <td class="text-center"><?php echo $result['gameName']; ?></td>
      <td class="text-center"><?php echo $result['gameCateName']; ?></td>
      
      <td class="text-center"><img src="img/<?php echo $result['gamePic']; ?>" class="img-data" alt=""></td>
      
      <td  >
        <div class="d-flex justify-content-evenly align-items-center ">
        <a class="btn btn-primary  text-white" href="gameprofile.php?gid=<?php echo $result['gameID'] ?>">view</a>
        <a class="btn btn-warning  text-white" href="editgame.php?gid=<?php echo $result['gameID'] ?>">update</a>
        <a class="btn btn-danger  text-white" href="delgame.php?gid=<?php echo $result['gameID'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">del</a>
        </div>
    </td>

    </tr>
   
    <?php
    }
    ?>
    
  </tbody>
</table>
  </div>
</div>
<?php
    }
    ?>
<div aria-label="Page navigation example ">
  <ul class="pagination d-flex justify-content-end">
  <?php 
                    if ($n>1){
                        echo 
                        "<li class='page-item'>
                            <a class='page-link' href='showgame.php?n=". ($n-1) ."'>Previous</a>
                        </li>";
                    }else{
                        echo 
                        "<li class='page-item'>
                            <a class='page-link' href='showgame.php?n=1'>Previous</a>
                        </li>";
                    } 
                    $i=1;
                    while($i<=$numPages){ 
                    echo 
                        "<li class='page-item'>
                            <a class='page-link' href='showgame.php?n=".$i."'>". $i. "</a>
                        </li>";  
                        $i++;
                    } 
                    if ($n<$numPages){   
                        echo 
                            "<li class='page-item'>
                                <a class='page-link' href='showgame.php?n=".  ($n+1) ."'>Next</a>
                            </li>";
                    }else{
                        echo
                            "<li class='page-item'>
                                <a class='page-link' href='showgame.php?n=".$numPages  ."'>Next</a>
                            </li>";
                    
                    }
                ?>
  </ul>
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
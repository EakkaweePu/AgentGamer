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
 $sql = "SELECT * FROM `tbl_agents` ";

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

    $sql2 = "SELECT agent.agentID, agent.agentFullname, agent.agentEmail, agent.agentPic  , game.gameName
    FROM tbl_agents as agent
    INNER JOIN tbl_game as game ON agent.gameID = game.gameID where agent.agentStatus = 'Y' ORDER BY agent.agentID limit {$start},  {$itemsPerPage} ;";
    // echo $sql2;
    // exit;
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
        $("#agent").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#agentTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
</head>
<body class="bg-dark">
<?php include 'navbar.php' ?>
<div class="container">
<div class="title my-4">
     <h3>agent management</h3>
</div>

<div class="row justify-content-center">
          <form action="#" class="col-5 ">
          <div>
          <input type="text" class="form-control rounded-radius loginform"  id="agent" placeholder="ค้นหา">
          </div>
          </form>
          
        </div>

<?php 
    if($count_row>0){
    
    ?>
  <div class="text-end">
          <a class="btn btn-success  text-white" href="addagent.php">add data</a>
  </div>
<table class="table bg-table text-white table-bordered mt-4" id="agentTable">
  <thead>
    <tr class="text-center">
      <th scope="col">Agent ID</th>
      <th scope="col">Fullname</th>
      <th scope="col">Email</th>
      <th scope="col">Game</th>
      <th scope="col">Picture</th>
      <th scope="col">Manage</th>
      
    </tr>
  </thead>
  <?php
    while($result = $result2->fetch_assoc()){
?>
  <tbody>
    <tr>
      <th class="text-center"><p><?php echo $result['agentID']; ?></p></th>
      <td class="text-center"><p><?php echo $result['agentFullname']; ?></p></td>
      <td class="text-center"><p><?php echo $result['agentEmail']; ?></p></td>
      <td class="text-center"><p><?php echo $result['gameName']; ?></p></td>
      <td class="text-center"><p><img src="img/<?php echo $result['agentPic']; ?>" class="img-data" alt=""></td>
      
      <td  >
        <div class="d-flex justify-content-evenly align-items-center ">
        <a class="btn btn-primary  text-white" href="agentprofile.php?agid=<?php echo $result['agentID'] ?>">view</a>
        <a class="btn btn-warning  text-white" href="editagent.php?aid=<?php echo $result['agentID'] ?>">update</a>
        <a class="btn btn-danger  text-white" href="delagent.php?aid=<?php echo $result['agentID'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">del</a>
        </div>
    </td>
      <!-- <td class="text-center"></td>
      <td class="text-center"></td> -->

    </tr>
   
    <?php
    }
    ?>
    
  </tbody>
</table>
<?php
    }
    ?>
<div aria-label="Page navigation example ">
  <ul class="pagination d-flex justify-content-end">
  <?php 
                    if ($n>1){
                        echo 
                        "<li class='page-item'>
                            <a class='page-link' href='showagent.php?n=". ($n-1) ."'>Previous</a>
                        </li>";
                    }else{
                        echo 
                        "<li class='page-item'>
                            <a class='page-link' href='showagent.php?n=1'>Previous</a>
                        </li>";
                    } 
                    $i=1;
                    while($i<=$numPages){ 
                    echo 
                        "<li class='page-item'>
                            <a class='page-link' href='showagent.php?n=".$i."'>". $i. "</a>
                        </li>";  
                        $i++;
                    } 
                    if ($n<$numPages){   
                        echo 
                            "<li class='page-item'>
                                <a class='page-link' href='showagent.php?n=".  ($n+1) ."'>Next</a>
                            </li>";
                    }else{
                        echo
                            "<li class='page-item'>
                                <a class='page-link' href='showagent.php?n=".$numPages  ."'>Next</a>
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
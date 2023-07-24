<?php  
    session_start();
    include 'conDB.php';
    
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
 $sql = "SELECT * FROM `products` ";

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

    $sql2 = "select * from products p, categories c where p.CategoryID = c.CategoryID limit {$start},  {$itemsPerPage}";
    //echo $sql2;
    $result2 = $con->query($sql2);
    //echo $count_row;
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <?php include 'navbar.php' ?>

    <div class="container">
    <?php 
    if($count_row>0){
    
    ?>
        
    
    <table class="table mt-4 table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">Product_ID</th>
      <th scope="col">Product name</th>
      <th scope="col">UnitPrice</th>
      <th scope="col">UnitsInStock</th>
      <!-- <th scope="col">picture</th>
      <th scope="col">edit</th>
      <th scope="col">del</th> -->
    </tr>
  </thead>
        
  <tbody>
  <?php
    while($result = $result2->fetch_assoc()){

?>
    <tr>
      <td><?php echo $result['ProductID']; ?></td>
      <td><?php echo $result['ProductName']; ?></td>
      <td><?php echo $result['UnitPrice']; ?></td>
      <td><?php echo $result['UnitsInStock']; ?></td>
      <!-- <td><img src="img/<?php echo $result['user_pic']; ?>" class="img-thumbnail" width="200px" height="200px" alt="..."></td> -->
      <td><a class="btn btn-warning" href="editproduct.php?pid=<?php echo $result['ProductID']; ?>" role="button">Update</a></td>
      <td><a class="btn btn-danger" href="#" role="button">Delete</a></td>
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
                            <a class='page-link' href='showproduct.php?n=". ($n-1) ."'>Previous</a>
                        </li>";
                    }else{
                        echo 
                        "<li class='page-item'>
                            <a class='page-link' href='showproduct.php?n=1'>Previous</a>
                        </li>";
                    } 
                    $i=1;
                    while($i<=$numPages){ 
                    echo 
                        "<li class='page-item'>
                            <a class='page-link' href='showproduct.php?n=".$i."'>". $i. "</a>
                        </li>";  
                        $i++;
                    } 
                    if ($n<$numPages){   
                        echo 
                            "<li class='page-item'>
                                <a class='page-link' href='showproduct.php?n=".  ($n+1) ."'>Next</a>
                            </li>";
                    }else{
                        echo
                            "<li class='page-item'>
                                <a class='page-link' href='showproduct.php?n=".$numPages  ."'>Next</a>
                            </li>";
                    
                    }
                ?>
  </ul>
  </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  </body>
</html>
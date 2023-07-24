<?php
    session_start();
    if(isset($_SESSION['userID'])){
        

        unset($_SESSION['userID']);
        
        // unset($_SESSION['username']);
        header('Location: index.php');
    }
    

?>
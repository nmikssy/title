<?php

include 'session_a.php';
if(isset($_GET['id'])){
    $aid = $_GET['id'];  
   
    
        include 'connection.php';
      
        
        $sql = "UPDATE tbl_appliedjobs SET status='Rejected' WHERE id='$aid';";
        $result=$conn->query($sql);
        header('location: a_viewapplications.php');
}else{     
                header('location: index.php?msg=dup');
}
                die();
?>
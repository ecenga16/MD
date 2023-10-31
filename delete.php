<?php 
   session_start();
   include("config.php");

   if(isset($_GET['doctor_id'])){
        
        $sql = "DELETE FROM doctors WHERE  id=".$_GET['doctor_id'].";";
        $res = $conn->query($sql);
        header("location: user.php");
   }

?>
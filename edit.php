<?php
session_start();
include("config.php");
     
if(!isset($_SESSION['id'])){
    header("location: index.php");
    exit();
}

$name='';
$surname = '';
$phone = '';
$city = '';
$expertise = '';

$doctor_id = '';

$janar = '';
$shkurt = '';
$mars = '';
$prill = '';
$maj = '';
$qershor = '';
$korrik = '';
$gusht = '';
$shtator = '';
$tetor = '';
$nentor = '';
$dhjetor = '';

if(isset($_GET['doctor_id'])){

   echo "here";

   $sql = "SELECT * FROM  doctors WHERE  id=".$_GET['doctor_id'].";";
   $res = $conn->query($sql);

   if($res->num_rows > 0){
      while($row = $res->fetch_assoc()){
          
          $name = $row['name'];
          $surname = $row['surname'];
          $phone = $row['phone'];
          $city = $row['city'];
          $expertise = $row['expertise'];
  
          $doctor_id = $row['id'];
  
          $janar = $row['january'];
          $shkurt = $row['february'];
          $mars = $row['march'];
          $prill = $row['april'];
          $maj = $row['may'];
          $qershor = $row['june'];
          $korrik = $row['july'];
          $gusht = $row['august'];
          $shtator = $row['september'];
          $tetor = $row['october'];
          $nentor = $row['november'];
          $dhjetor = $row['december'];
          
      }
  }    
}

if(isset($_POST['name'])){
   
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $expertise = $_POST['expertise'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    $janar = $_POST['january'];
    $shkurt = $_POST['february'];
    $mars = $_POST['march'];
    $prill = $_POST['april'];
    $maj = $_POST['may'];
    $qershor = $_POST['june'];
    $korrik = $_POST['july'];
    $gusht = $_POST['august'];
    $shtator = $_POST['september'];
    $tetor = $_POST['october'];
    $nentor = $_POST['november'];
    $dhjetor = $_POST['december'];


    $sql = "UPDATE doctors SET name='".$name."', surname='".$surname."', expertise='".$expertise."', phone='".$phone."', city='".$city."', january='".$janar."', february='".$shkurt."', march='".$mars."', april='".$prill."', may='".$maj."', june='".$qershor."', july='".$korrik."', august='".$gusht."', september='".$shtator."', october='".$tetor."', november='".$nentor."', december='".$dhjetor."' WHERE id=".$_POST['doctor_id'].";";
    $conn->query($sql);

    echo $_POST['doctor_id']; 
    header("location: user.php");
    
}


?>
<html>
   
   <head>
      <title>Ndrysho</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   
   <body>
	   <h1>Portali i ndryshimit per doctorin</h1>

      <div>
         <form action="edit.php" method = "post">
            <div class="form-group">
               <label for="exampleInputEmail1">Emri</label>
               <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $name ?>">

               <label for="exampleInputEmail1">Mbiemri</label>
               <input name="surname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $surname ?>">
               
               <label for="exampleInputEmail1">Nr. i Tel</label>
               <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $phone ?>">
               
               <label for="exampleInputEmail1">Qyteti</label>
               <input name="city" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $city ?>">
               
               <label for="exampleInputEmail1">Specialiteti</label>
               <input name="expertise" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $expertise ?>">
               
               <label for="exampleInputEmail1">Janar</label>
               <input name="january" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $janar ?>">
               
               <label for="exampleInputEmail1">Shkurt</label>
               <input name="february" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $shkurt ?>">
               
               <label for="exampleInputEmail1">Mars</label>
               <input name="march" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $mars ?>">
               
               <label for="exampleInputEmail1">Prill</label>
               <input name="april" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $prill ?>">
               
               <label for="exampleInputEmail1">Maj</label>
               <input name="may" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $maj ?>">
               
               <label for="exampleInputEmail1">Qershor</label>
               <input name="june" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $qershor ?>">
               
               <label for="exampleInputEmail1">Korrik</label>
               <input name="july" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $korrik ?>">
               
               <label for="exampleInputEmail1">Gusht</label>
               <input name="august" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $gusht ?>">
               
               <label for="exampleInputEmail1">Shtator</label>
               <input name="september" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $shtator ?>">
               
               <label for="exampleInputEmail1">Tetor</label>
               <input name="october" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $tetor ?>">
               

               <label for="exampleInputEmail1">Nentor</label>
               <input name="november" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $nentor ?>">
               
               <label for="exampleInputEmail1">Dhjetor</label>
               <input name="december" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $dhjetor ?>">
               

               <input name="doctor_id" value= "<?php echo $doctor_id ?>" type="hidden">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>
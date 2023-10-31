<?php
session_start();
include("config.php");
     
if(!isset($_SESSION['id'])){
    header("location: index.php");
    exit();
}

$sql = "SELECT * FROM users WHERE id = '".$_SESSION['id']."';";
$result = $conn->query($sql);

$name = '';
$surname = '';
$role = '';
$expertise = '';
$phone = '';
$city = '';

if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $name = $row['name'];
        $surname  = $row['surname'];
        $role = $row['role'];
        $expertise = $row['expertise'];
        $phone = $row['phone'];
        $city= $row['city'];
    }
}


?>

<html>
   
   <head>
      <title>Profili</title>
      
      <style type = "text/css">
         table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   <table> 
        <thead>
        <th>Fusha</th>
        <th>Vlera</th>
        </thead>
        <tbody>
        <tr> <td>Emri</td><td><?php echo $name; ?> </td></tr>
        <tr> <td>Mbiemri</td><td><?php echo $surname; ?> </td></tr>
        <tr> <td>Roli</td><td><?php echo $role; ?> </td></tr>
        <tr> <td>Nr. Tel</td><td><?php echo $phone; ?> </td></tr>
        <tr> <td>Specialiteti</td><td><?php echo $expertise; ?> </td></tr>
        <tr> <td>Qyteti</td><td><?php echo $city; ?> </td></tr>
        
        </tbody>
    </table>

         <br><br>
         <a href = "<?php if($role == 'admin') echo "admin.php"; else echo "user.php"; ?>" > Kthehu</a>
         <br>
         <a href = "edit.php">Edito</a><br>
         <a href = "logout.php">Dil</a>
   </body>
</html>
<?php 
    session_start();
    include("config.php");

    if(!isset($_SESSION['role'])){
        header("location: index.php");
    }

    if($_SESSION['role'] != 'admin'){
        header("location: index.php");
    }

  
?>

<html>
<head>
<style>
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
<body>

<h2>Te gjithe perdoruesit me doktoret perkates</h2>

<?php 

$sql = "SELECT * FROM users, doctors WHERE users.id = doctors.userid;";
$res = $conn->query($sql);
?>

<table> <thead>
<tr> 
<th>Emri</th>
<th>Mbiemri</th>
<th>Specialiteti</th>
<th>Numri.Tel</th>
<th>Qytetit</th>
<th>Janar</th>
<th>Shkurt</th>
<th>Mars</th>
<th>Prill</th>
<th>Maj</th>
<th>Qershor</th>
<th>Korrik</th>
<th>Gusht</th>
<th>Shtator</th>
<th>Tetor</th>
<th>Nentor</th>
<th>Dhjetor</th>
<th>Specialisti</th>
</tr>
</thead>
<tbody>
<?php 
if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
        echo "<tr><td>".$row['name']."</td><td>".$row['surname']."</td><td>".$row['expertise']."</td><td>".$row['phone']."</td><td>".$row['city']."</td><td>".$row['january']."</td><td>".$row['february']."</td><td>".$row['march']."</td><td>".$row['april']."</td><td>".$row['may']."</td><td>".$row['june']."</td><td>".$row['july']."</td><td>".$row['august']."</td><td>".$row['september']."</td><td>".$row['october']."</td><td>".$row['november']."</td><td>".$row['december']."</td><td>".$row['username']."</td></tr>";
    }
}

?>

</tbody>
</table>
<br><br>



<a href = "logout.php">Dil</a>
</body>
</html>
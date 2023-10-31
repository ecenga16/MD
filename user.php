<?php 
    session_start();
    include("config.php");

    if(!isset($_SESSION['role'])){
        header("location: index.php");
    }

    if($_SESSION['role'] != 'user'){
        header("location: index.php");
    }
?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<h2>Mirese erdhe <?php echo $_SESSION['username']?></h2>

<?php 

        $sql = "SELECT  * FROM doctors WHERE  doctors.userid=".$_SESSION['id']." ORDER BY doctors.name ASC";
        $res = $conn->query($sql);

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

?>

<table class = "table"> 
    <thead>
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

            <th>Ndrysho</th>
            <th>Hiq</th>
        </tr>
    </thead>
    <tbody>

<?php
if($res->num_rows > 0){

    
    $name_array = array('janar', 'shkurt', 'mars', 'prill', 'maj', 'qershor', 'korrik', 'gusht', 'shtator', 'tetor', 'nentor', 'dhjetor');
    $val_array_euro = array(0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0);
    $val_array_lek = array(0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0);
    


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

        foreach($name_array as $index => $var_name){
            $curr_value = $$var_name;
            $number_names = explode("/", $curr_value);

            foreach($number_names as $num_val){
                if (strpos($num_val, 'ALL') !== false) {
                    $dub_val = str_replace('ALL', '', $num_val);
                    $val_array_lek[$index] += floatval($dub_val);
                    echo $val_array_lek[$index];
                }
                else  if (strpos($num_val, 'Euro') !== false) {
                    $dub_val = str_replace('Euro', '', $num_val);
                    $val_array_euro[$index] += floatval($dub_val);
                    echo $val_array_euro[$index];
                }
            }

        }

        echo "<tr><td>$name</td><td>$surname</td><td>$expertise</td><td>$phone</td><td>$city</td><td>$janar</td><td>$shkurt</td><td>$mars</td><td>$prill</td><td>$maj</td><td>$qershor</td><td>$korrik</td><td>$gusht</td><td>$shtator</td><td>$tetor</td><td>$nentor</td><td>$dhjetor</td> <td><button class= \"btn btn-warning\"><a style=\"text-decoration: none;\" href=\"edit.php?doctor_id=".$doctor_id."\"> Ndrysho</a></button> </td> <td><button class=\"btn btn-danger\"><a style= \"text-decoration: none\" href=\"delete.php?doctor_id=".$doctor_id."\"> Fshij</a> </button> </td> </tr>";
 }

    echo "<tr><td colspan='5' style='background-color: lightgrey'><center><strong>Shuma</strong></center></td>";

    foreach($name_array as $index=>$months){
        $text = $val_array_lek[$index]." ALL / ".$val_array_euro[$index]." Euro ";

        echo "<td>".$text."</td>";
    }

    echo "</tr>";

}    

?>
</tbody>
</table>
    
    <a href = "add.php">Shto</a><br>
    <a href = "logout.php">Dil</a>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
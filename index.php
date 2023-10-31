<?php
 session_start();
   include("config.php");
  
   
   if(isset($_POST['username']) and isset($_POST['password'])) {
      // username and password sent from form 
      
    $myusername = $_POST['username'];
    $mypassword = $_POST['password']; 
      
    $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword';";
    $result = $conn->query($sql);

    $username = '';
    $password = '';
    $role = '';
    $name = '';
    $id = '';

    if($result->num_rows > 0){
            
         while ($row = $result->fetch_assoc()){
            $username = $row['username'];
            $password  = $row['password'];
            $name = $row['name'];
            $role = $row['role'];
            $id= $row['id'];
         }

         $_SESSION['username'] = $username;
         $_SESSION['role'] = $role;
         $_SESSION['name'] = $name;
         $_SESSION['id'] = $id;
         $_SESSION['logged_in'] = true;
         
         if($_SESSION['role']== 'admin'){
         
            header("location: admin.php");
            exit();
         
         }else if($_SESSION['role'] == 'user'){
         
            header("location: user.php");
            exit();
         
         }else{
         
            header("location: index.php");
            exit();
         
         }
   }
}
?>
<html>
   
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
   
   <body>
      <div class="container">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
            <div class="form-group">
               <label for="exampleInputEmail1">Username</label>
               <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input name = "password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group form-check">
               <input type="checkbox" class="form-check-input" id="exampleCheck1">
               <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>

      <a href="register.php">Rregjistrohu</a>

      <!-- Bootstrap Scripts -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>
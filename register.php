<?php  require 'conn.php' ;  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <link  rel="stylesheet" href="css/bootstrap.css">
<body>
<div class="d-flex justify-content-center" class="form">

<!--  register   -->

<form method="POST">
    <p> log in</p>
    <div>
    <input type="text" placeholder="email" name="u_email">

    </div>
    <div>
    <input type="text" placeholder="username" name="u_name">

    </div>

    <div>  
    <input type="password" placeholder="password" name="u_pass">


    </div>
    <div>
    <input type="submit" value="register" class="btn btn-success" name="u_reg">
  <a href="index.php">  <input type="submit" value="log in" class="btn btn-primary"> </a>

    </div>



</form>

<!--  register   -->
<?php

if (isset($_POST['u_reg']) ){

    $u_email  = $_POST['u_email'] ;
    $u_name  = $_POST['u_name'] ;
    $u_pass  = md5($_POST['u_pass']) ;

    $sql = "INSERT INTO users (u_email , u_name , u_pass) VALUES ('$u_email' , '$u_name' , '$u_pass')" ;
    if (mysqli_query($conn , $sql)) {
        echo "<script> alert('registerd succsefully') </script>" ;
    }else{
        echo "error:" . "<\br>" . mysqli_error($conn) ; 

    }
}

 ?>
</div>
<script src="js/bootstrap.js" ></script>
</head>
</body>
</html>
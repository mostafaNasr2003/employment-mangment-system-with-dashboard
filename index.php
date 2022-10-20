<?php  require 'conn.php' ;
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <link  rel="stylesheet" href="css/bootstrap.css">
<body>
<div class="d-flex justify-content-center" class="form" name="u_login">

<form method="POST">
    <p> log in</p>

    <div>
    <input type="text" placeholder="username" name="u_name">

    </div>

    <div>  
    <input type="password" placeholder="password" name="u_pass">


    </div>
    <div>
    <input type="submit" value="login as admin" class="btn btn-primary" name="u_login">
    <input type="submit" value="register" class="btn btn-success">

    </div>



</form>
<!-- log in -->
<?php
if(isset($_POST['u_login']) ) {
    $u_name = $_POST['u_name'] ;
    $u_pass = md5($_POST['u_pass']) ;

    $sql = "SELECT * FROM users WHERE u_name='$u_name' " ;
    $result = mysqli_query($conn , $sql) ;

    if (mysqli_num_rows($result) > 0) {

        while($users = mysqli_fetch_assoc($result)) {
            if($u_name == $users['u_name'] && $u_pass == $users['u_pass']) {
                $_SESSION['u_name'] = $u_name ;
                header('location:dash.php') ;
            }else {
                echo "<script> alert('incorrect username or password') ;  </script>" ;
            }
        }
}else {
    echo "0 results" ;
}
}
?>

</div>
</head>
</body>
</html>
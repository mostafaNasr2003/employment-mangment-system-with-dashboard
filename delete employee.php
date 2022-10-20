<?php require 'conn.php' ;
$id = $_GET['e_id'] ;
$sql = "DELETE FROM employess WHERE e_id='$id' " ;
if (mysqli_query($conn , $sql)) {
    header('location:dash.php') ;
}else {
     echo "error deleting record " . mysqli_error($conn) ;
}

?>
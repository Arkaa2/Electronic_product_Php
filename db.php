<?php

$a= $_POST['name'];
$b= $_POST['mobile'];
$c= $_POST['spec'];
$d= $_POST['color'];

if(isset($_POST['pay'])){
   $e = implode(",",$_POST['pay']);
}
else{
    $e ="";
}

$buf = $_FILES['img']['tmp_name'];
$fn= time().$_FILES['img']['name'];
move_uploaded_file($buf,"upload/".$fn);


$con = mysqli_connect("localhost","root","","task_sayan");
$ins ="INSERT INTO std SET name='$a', mobile='$b', spec='$c', color='$d', pay='$e', image='$fn'";

if($con->query($ins)){
    header("location:show.php");
}

?>
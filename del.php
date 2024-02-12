<?php
$con = mysqli_connect("localhost","root","","task_sayan");
$id=$_GET['id'];

$sel="SELECT * FROM std WHERE c_id ='$id'";
$rs=$con->query($sel);
$row=$rs->fetch_assoc();
unlink("uplode/".$row['image']);

$del="DELETE FROM std WHERE c_id ='$id'";
$con->query($del);
header("location:show.php");
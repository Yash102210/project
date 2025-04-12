<?php
$connect = mysqli_connect("localhost","root","","user") or die("Connection Failed!");
if($connect){
    echo "Connected";
}else{
    echo "Not Connected";
}
?>
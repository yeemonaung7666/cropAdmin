<?php 
require "../init.php";

if(isset($_GET['id'])){
    $id= $_GET['id'];

    $delete= query("delete from info where id=$id");

    go("http://localhost:100/cropAdmin/english/content.php?delete=success");
}
?>
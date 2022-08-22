<?php 
    include "../config/koneksi.php";
    $id = $_GET['id'];
    $sql = "SELECT * from member WHERE id_mem=".$id."";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($query);
    echo json_encode($data);
?>
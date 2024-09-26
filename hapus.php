<?php
session_start();

// ambil data dlu
if(isset($_GET['hapus'])){
    $hapus_id = $_GET['hapus'];
    // hapus berdasarkan hapus by index di sesion
    unset($_SESSION["todolist"][$hapus_id]);
}

//kembali ke halaamn user list
header("Location: proses.php");
exit();

?>
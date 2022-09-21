<?php
session_start();
session_unset(); 
session_destroy(); 
session_start();
$_SESSION["info"] = "\n Anda berhasil keluar. Silakan login jika ingin masuk kembali."; 
header("Location: sign-in.php"); 
?>
<?php
$servername = "localhost";
$usernamedb = "ngadimin";
$passworddb = "blasBlas4ngine..";
$dbname = "telepresence";

function saring($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php

session_start();
include('../../../php/connect_to_mysql.php');
include('../../../php/functions.php');
	$db=createConnection();


  $userid = $_POST['user'];
  $usertype = 3;
  $sql = "UPDATE users SET usertype = ? where userid=?";
  $stmt=$db->prepare($sql);
  $stmt->bind_param("ii",$usertype,$userid);
  $stmt->execute();
  $stmt->close();

 ?>

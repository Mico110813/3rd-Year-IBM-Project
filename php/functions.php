<?php
function createConnection() {
	$host="localhost";
	$user="xxx";
	$userpass='xxx';
	$schema="xxx";
	$conn = new mysqli($host,$user,$userpass,$schema);
	if(mysqli_connect_errno()) {
		echo "Could not connect to database: ".mysqli_connect_errno();
		exit;
	}
	return $conn;
}
function getChar($chartoget) {
	$charstr="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	return $charstr[$chartoget];
}

function getSalt($saltLength) {
	$randomString="";
	for($i=0;$i<$saltLength;$i++) {
		$randomChar=getChar(mt_rand(0,51));
		$randomString.=$randomChar;
	}
return $randomString;
}

function makeHash($plainText,$salt,$n) {
	$hash=$plainText.$salt;
	for($i=0;$i<$n;$i++) {
		$hash=hash("sha256",$plainText.$hash.$salt);
	}
	return $hash;
}
//Params passed in
//$usersessionid = user's id, $sessionid=session_id()
//$ptype = level of access required for current page 1,2 or 3
function checkUser($usersessionid,$sessionid,$ptype) {
	$dbchk = createConnection();
	$lookupsql="select usertype,sessionid,username from users where userid=?";
	$lookup=$dbchk->prepare($lookupsql);
	$lookup->bind_param("i",$usersessionid);
	$lookup->execute();
	$lookup->store_result();
	$lookup->bind_result($utype,$storedsession,$uname);
	$lookup->fetch();
	if($lookup->num_rows==1) {
		$lookup->close();
		$dbchk->close();
		if($sessionid!=$storedsession || $storedsession=="" || $utype>$ptype) {
			header("location: php/logout.php");
		}
	} else {
		$lookup->close();
		$dbchk->close();
		header("location: php/logout.php");
	}
	return $uname;
}

?>
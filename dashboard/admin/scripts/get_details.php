<?php


session_start();
include('../../../php/connect_to_mysql.php');
include('../../../php/functions.php');
$db=createConnection();
function numberToString($n)
{
    return $n === 1 ? 'YES' : 'NO';
}


		$sql="select users.username,users.firstname,users.surname,users.usertype, users.userid, coursestudent.course_id from users inner join coursestudent on  users.userid = coursestudent.userid";
		$stmt=$db->prepare($sql);

		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($username,$firstname,$surname,$usertype,$userid,$courseid);

		while($row=$stmt->fetch()) {
			$array[]=[
        'username' => $username,
        'firstname' => $firstname,
        'surname' => $surname,
        'usertype' => $usertype,
        'userid' => $userid,
        'courseid' => $courseid
      ];
		}



echo json_encode(array('data' => $array));
?>

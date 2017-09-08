<?php


session_start();
include('../../../php/connect_to_mysql.php');
include('../../../php/functions.php');
$db=createConnection();
function numberToString($n)
{
    return $n === 1 ? 'YES' : 'NO';
}


		$sql="select users.username,users.firstname,users.surname,users.usertype, users.userid, users.dept_id, department.dept_name from users inner join department on  users.dept_id = department.dept_id";
		$stmt=$db->prepare($sql);

		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($username,$firstname,$surname,$usertype,$userid,$deptid,$deptname);

		while($row=$stmt->fetch()) {
			$array[]=[
        'username' => $username,
        'firstname' => $firstname,
        'surname' => $surname,
        'usertype' => $usertype,
        'userid' => $userid,
        'deptid' => $deptid,
        'deptname' => $deptname
      ];
		}



echo json_encode(array('data' => $array));
?>

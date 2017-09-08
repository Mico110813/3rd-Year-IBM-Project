<?php


session_start();
include('../../../php/connect_to_mysql.php');
include('../../../php/functions.php');
$db=createConnection();

if(isset($_POST['user'])) {
		$userid = $_POST['user'];
		$sql="select course.course_title,result.result,result.result_pcent,result.result_date_submitted, result.result_comment , concat(users.firstname, ' ',
                            users.surname) as 'Name'
                           from result
                           inner join course on result.course_id = course.course_id
                           inner join users on users.userid = result.userid
                           where result.result_id = ?";
		$stmt=$db->prepare($sql);
		$stmt->bind_param("i",$userid);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($course_name,$result,$result_pcent,$result_date_submitted,$comment,$name);

    while($row=$stmt->fetch()) {
      $array[]=[

        'title' => $course_name,
        'name' => $name,
        'result' => $result,
        'pcent' => $result_pcent,
        'comment'=> $comment,
        'date' => $result_date_submitted

      ];
    }
echo json_encode(array('data' => $array));

}
else{
  echo json_encode("error error error");
}

?>

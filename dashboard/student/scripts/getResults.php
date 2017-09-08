<?php


session_start();
include('../../../php/connect_to_mysql.php');
include('../../../php/functions.php');
$db=createConnection();

if(isset($_SESSION['userid'])) {
		$userid = $_SESSION['userid'];
		$sql="select course.course_id,course.course_title,result.result,result.result_pcent,result.result_date_submitted, result.result_id from result inner join course on result.course_id = course.course_id where result.userid = ? ";
		$stmt=$db->prepare($sql);
		$stmt->bind_param("i",$userid);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($course_id,$course_name,$result,$result_pcent,$result_date_submitted,$result_id);

    while($row=$stmt->fetch()) {
      $array[]=[
        'course_id' => $course_id,
        'course_name' => $course_name,
        'result' => $result,
        'pcent' => $result_pcent,
        'date' => $result_date_submitted,
        'result_id' => $result_id
      ];
    }
echo json_encode(array('data' => $array));

}

?>

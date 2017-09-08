<?php


session_start();
include('../../../php/connect_to_mysql.php');
include('../../../php/functions.php');
$db=createConnection();

if(isset($_SESSION['userid'])) {
		$userid = $_SESSION['userid'];
		$sql="select course.course_title, course.course_desc,course.course_id from course inner join coursestudent on course.course_id = coursestudent.course_id where coursestudent.userid = ?";
		$stmt=$db->prepare($sql);
		$stmt->bind_param("i",$userid);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($course_name,$desc,$course_id);

    while($row=$stmt->fetch()) {
      $array[]=[
        'course_id' => $course_id,
        'course_name' => $course_name,
        'desc' => $desc,

      ];
    }
echo json_encode(array('data' => $array));

}

?>

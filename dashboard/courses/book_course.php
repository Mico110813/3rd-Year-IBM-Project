<?php
session_start();
include('../../php/connect_to_mysql.php');
include('../../php/functions.php');

if(isset($_GET['course'])){
  $courseid = $_GET['course'];
  $userid = $_SESSION["userid"];
  $db = createConnection();
  $sql="select places_total,places_booked from course where course_id =?";
  $stmt=$db->prepare($sql);
  $stmt->bind_param("i",$courseid);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($places_total,$places_booked);

  while($row=$stmt->fetch()) {
    $placestotal = $places_total;
    $placesbooked = $places_booked;
    $stmt->close();
  }

  $sql="select course_id,userid,student_status from coursestudent where course_id =? and userid= ? LIMIT 1";
  $stmt=$db->prepare($sql);
  $stmt->bind_param("ii",$courseid,$userid);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($coursecheck,$usercheck,$student_status);
  while($row=$stmt->fetch()) {
    $checkCourse = $coursecheck;
    $checkUser = $usercheck;
    $checkStatus = $student_status;
    $stmt->close();
  }
  if($checkCourse == $courseid && $checkUser == $_SESSION["userid"]){
    
    if($checkCourse == $courseid && $checkUser == $_SESSION["userid"] && $checkStatus == "Rejected"){
          echo json_encode("User exists already but we're updating status");
          $sql = "UPDATE coursestudent SET student_status = 'Unconfirmed' where course_id=? and userid=?";
          $stmt=$db->prepare($sql);
          $stmt->bind_param("ii",$courseid,$userid);
          $stmt->execute();
          $placestaken++;
          $sql = "UPDATE course SET places_booked =? WHERE course_id = ?";
          $stmt=$db->prepare($sql);
          $stmt->bind_param("ii",$placesbooked,$courseid);
          $stmt->execute();
          $stmt->close();
        }
  } else{

        echo json_encode("User hasn't applied yet");
        $sql = "insert into coursestudent(course_id,userid) values (?,?)";
        $stmt=$db->prepare($sql);
        $stmt->bind_param("ii",$courseid,$userid);
        $stmt->execute();
        $placesbooked++;
        $sql = "UPDATE course SET places_booked =? WHERE course_id = ?";
        $stmt=$db->prepare($sql);
        $stmt->bind_param("ii",$placestaken,$courseid);
        $stmt->execute();
        $stmt->close();
    }

    $arr[] = array('1'=> $placestotal,'2'=> $placesbooked,'3'=> $checkCourse,'4'=> $checkUser,'5'=> $checkStatus,'6'=> $courseid, '7'=> $courseid, '8'=> $_SESSION["userid"] );

    echo json_encode($arr);
}
?>

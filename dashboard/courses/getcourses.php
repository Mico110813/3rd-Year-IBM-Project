<?php


session_start();
include('../../php/connect_to_mysql.php');
include('../../php/functions.php');
$db=createConnection();
function numberToString($n)
{
    return $n === 1 ? 'YES' : 'NO';
}
		$sql="select course_id,course_title,course_desc,course_duration,places_total,places_booked,course_cost from course";
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($courseid,$title,$desc,$duration,$places_total,$places_booked,$cost);
		while($row=$stmt->fetch()) {
			$courses[] = array('courseid'=> $courseid,'title'=> $title,'desc'=> $desc,'duration'=> $duration,'places_total'=> $places_total,'places_booked'=> $places_booked,'cost'=> $cost);
		}
echo $jsonformat=json_encode($courses);
?>

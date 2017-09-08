<?php


// DataTables PHP library
include( "../../admin/DataTables/Editor-1.5.5/php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'coursestudent', 'application_id' )
    ->fields(
        Field::inst('coursestudent.application_id'),
        Field::inst( 'users.userid' )
          ->options( 'coursestudent', 'coursestudent.userid', 'userid' )
          ->validator( 'Validate::dbValues' ),
        Field::inst( 'users.username' ),
        Field::inst( 'users.firstname' ),
        Field::inst( 'users.surname' ),
        Field::inst( 'users.emailadd' ),
        Field::inst( 'users.dept_id' ),
        Field::inst( 'users.usertype' ),
        Field::inst( 'coursestudent.course_id' )
        ->options( 'coursestudent', 'coursestudent.course_id', 'course_id' )
        ->validator( 'Validate::dbValues' ),
        Field::inst( 'coursestudent.student_status' )
        ->options( 'coursestudent', 'coursestudent.student_status', 'student_status' )
        ->validator( 'Validate::dbValues' )
    )

    ->leftJoin( 'users', 'users.userid', '=', 'coursestudent.userid' )
    ->process( $_POST )
    ->json();
?>

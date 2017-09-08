<?php


// DataTables PHP library
include( "../DataTables/Editor-1.5.5/php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'result', 'result_id' )
    ->fields(
        Field::inst( 'result.result_id' ),
        Field::inst( 'result.userid' ),
        Field::inst( 'result.course_id' ),
        Field::inst( 'result.result' ),
        Field::inst( 'result.result_pcent' ),
        Field::inst( 'result.result_comment' ),
        Field::inst( 'result.result_date_submitted' ),
        Field::inst( 'course.course_title' )
        )
    ->leftJoin( 'course', 'course.course_id', '=', 'result.course_id' )
    ->process( $_POST )
    ->json();
?>

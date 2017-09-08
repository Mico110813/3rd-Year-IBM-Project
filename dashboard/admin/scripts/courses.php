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
Editor::inst( $db, 'course', 'course_id' )
    ->fields(
        Field::inst( 'course_id' ),
        Field::inst( 'course_title' ),
        Field::inst( 'course_desc' ),
        Field::inst( 'course_duration' ),
        Field::inst( 'places_total' ),
        Field::inst( 'places_booked' ),
        Field::inst( 'course_cost' )
    )
    ->process( $_POST )
    ->json();
?>

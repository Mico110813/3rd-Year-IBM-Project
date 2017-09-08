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
Editor::inst( $db, 'department', 'dept_id' )
    ->fields(
        Field::inst( 'dept_id' ),
        Field::inst( 'dept_name' )
    )
    ->process( $_POST )
    ->json();
?>

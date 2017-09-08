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
Editor::inst( $db, 'users', 'userid' )
    ->fields(
        Field::inst( 'users.userid' ),
        Field::inst( 'users.username' ),
        Field::inst( 'users.firstname' ),
        Field::inst( 'users.surname' ),
        Field::inst( 'users.emailadd' ),
        Field::inst( 'users.dept_id' ),

        Field::inst( 'users.usertype' ),
        Field::inst( 'department.dept_name' )
            ->options( 'department', 'department.dept_name', 'dept_name' )
            ->validator( 'Validate::dbValues' )
    )
    ->leftJoin( 'department', 'department.dept_id', '=', 'users.dept_id' )
    ->process( $_POST )
    ->json();
?>



<?php
// Create connection
$con = mysqli_connect('localhost', 'root', '', 'crudoperation');

// Check connection
if (!$con) {
    die(mysqli_error($con));
}
?>

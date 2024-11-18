<?php
session_start();
require_once '../config/db.php';

$note_id = $_GET['id'];
$query = "DELETE FROM notes WHERE id = '$note_id'";
if (mysqli_query($conn, $query)) {
    header('Location: ../index.php');
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

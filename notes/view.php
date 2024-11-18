<?php
session_start();
require_once '../config/db.php';

$note_id = $_GET['id'];
$query = "SELECT * FROM notes WHERE id = '$note_id'";
$result = mysqli_query($conn, $query);
$note = mysqli_fetch_assoc($result);
?>

<?php include '../templates/header.php'; ?>
<h2><?php echo $note['title']; ?></h2>
<p><?php echo nl2br($note['content']); ?></p>
<?php include '../templates/footer.php'; ?>

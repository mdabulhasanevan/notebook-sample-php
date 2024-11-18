<?php
session_start();
require_once '../config/db.php';

$note_id = $_GET['id'];
$query = "SELECT * FROM notes WHERE id = '$note_id'";
$result = mysqli_query($conn, $query);
$note = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "UPDATE notes SET title = '$title', content = '$content' WHERE id = '$note_id'";
    if (mysqli_query($conn, $query)) {
        header('Location: ../index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include '../templates/header.php'; ?>
<h2>Edit Note</h2>
<form method="POST" class="mt-4">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="<?php echo $note['title']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" id="content" class="form-control" required><?php echo $note['content']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php include '../templates/footer.php'; ?>

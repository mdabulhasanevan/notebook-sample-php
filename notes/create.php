<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO notes (title, content, user_id) VALUES ('$title', '$content', '$user_id')";
    if (mysqli_query($conn, $query)) {
        header('Location: ../index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include '../templates/header.php'; ?>
<h2>Create Note</h2>
<form method="POST" class="mt-4">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" id="content" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php include '../templates/footer.php'; ?>

<?php
session_start();
require_once 'config/db.php';
?>

<?php include 'templates/header.php'; ?>
<h1>Welcome to the Notebook</h1>

<?php if (isset($_SESSION['user_id'])): ?>
    <a href="notes/create.php" class="btn btn-primary">Create Note</a>
    <h2>Your Notes</h2>
    <ul class="list-group mt-3">
        <?php
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM notes WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $query);
        while ($note = mysqli_fetch_assoc($result)) {
            echo "<li class='list-group-item'>
                    <a href='notes/view.php?id={$note['id']}'>{$note['title']}</a>
                    <a href='notes/edit.php?id={$note['id']}' class='btn btn-warning btn-sm float-end ml-2'>Edit</a>
                    <a href='notes/delete.php?id={$note['id']}' class='btn btn-danger btn-sm float-end'>Delete</a>
                  </li>";
        }
        ?>
    </ul>
<?php else: ?>
    <p>Please <a href="login.php">login</a> to view your notes.</p>
<?php endif; ?>
<?php include 'templates/footer.php'; ?>

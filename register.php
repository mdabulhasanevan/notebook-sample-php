<?php
session_start();
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        header('Location: login.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include 'templates/header.php'; ?>
<h2>Register</h2>
<form method="POST" class="mt-4">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<?php include 'templates/footer.php'; ?>

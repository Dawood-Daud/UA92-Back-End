<?php
require_once '../includes/db_connect.php';
require_once '../includes/functions.php';

$page_title = "Login";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize_input($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, username, password_hash, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            
            redirect_with_message('../index.php', 'Login successful!');
        }
    }
    
    redirect_with_message('login.php', 'Invalid credentials', 'error');
}

include '../includes/header.php';
?>

<div class="auth-container">
    <div class="auth-card">
        <h2><i class="fas fa-lock"></i> Login</h2>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required class="form-control">
            </div>
            <button type="submit" class="btn btn-block">Login</button>
        </form>
        <div class="auth-links">
            <a href="register.php">Create account</a> | 
            <a href="password_reset.php">Forgot password?</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
<?php
require_once '../includes/header.php';
?>

<div class="auth-container">
    <div class="auth-card">
        <h2><i class="fas fa-key"></i> Reset Password</h2>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>
        
        <form action="process_reset.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required class="form-control">
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required class="form-control">
                <small>Minimum 8 characters with 1 number</small>
            </div>
            <button type="submit" class="btn btn-block">Reset Password</button>
        </form>
        
        <div class="auth-links">
            <a href="login.php">Back to Login</a>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
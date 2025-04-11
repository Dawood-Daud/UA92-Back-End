<?php
require_once '../includes/db_connect.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize_input($_POST['username']);
    $new_password = $_POST['new_password'];
    
    // Validate password strength
    if (strlen($new_password) < 8 || !preg_match('/\d/', $new_password)) {
        redirect_with_message(
            'password_reset.php',
            'Password must be 8+ characters with at least 1 number',
            'error'
        );
    }
    
    // Check if user exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    
    if ($stmt->get_result()->num_rows === 0) {
        redirect_with_message(
            'password_reset.php',
            'Username not found',
            'error'
        );
    }
    
    // Update password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    $update_stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE username = ?");
    $update_stmt->bind_param("ss", $hashed_password, $username);
    
    if ($update_stmt->execute()) {
        redirect_with_message(
            'login.php',
            'Password updated successfully! Please login'
        );
    } else {
        redirect_with_message(
            'password_reset.php',
            'Error updating password',
            'error'
        );
    }
}
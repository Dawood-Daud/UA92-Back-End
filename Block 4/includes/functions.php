<?php
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function redirect_with_message($url, $message, $type = 'success') {
    $_SESSION['flash'] = ['message' => $message, 'type' => $type];
    header("Location: $url");
    exit();
}

function display_flash_message() {
    if (isset($_SESSION['flash'])) {
        $message = $_SESSION['flash']['message'];
        $type = $_SESSION['flash']['type'];
        echo "<div class='alert alert-$type'>$message</div>";
        unset($_SESSION['flash']);
    }
}

function is_authenticated() {
    return isset($_SESSION['user_id']);
}

function has_role($role) {
    return ($_SESSION['role'] ?? '') === $role;
}

function password_strength_check($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password);
}
?>
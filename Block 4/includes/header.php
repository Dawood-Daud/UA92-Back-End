<?php
session_start();
require_once 'functions.php';

// Redirect to login if not authenticated
$allowed_pages = ['login.php', 'register.php', 'password_reset.php'];
$current_page = basename($_SERVER['PHP_SELF']);

if (!is_authenticated() && !in_array($current_page, $allowed_pages)) {
    redirect_with_message('/school_management/auth/login.php', 'Please login first', 'error');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'School Management' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-school"></i>
                    <h1>St Alphonsus</h1>
                </div>
                <nav>
                    <?php if (is_authenticated()): ?>
                        <ul>
                            <li><a href="../index.php"><i class="fas fa-home"></i> Dashboard</a></li>
                            <li><a href="../classes/"><i class="fas fa-door-open"></i> Classes</a></li>
                            <li><a href="../pupils/"><i class="fas fa-child"></i> Pupils</a></li>
                            <li><a href="../parents/"><i class="fas fa-user-friends"></i> Parents</a></li>
                            <li><a href="../teachers/"><i class="fas fa-chalkboard-teacher"></i> Teachers</a></li>
                        </ul>
                        <div class="user-menu">
                            <span class="user-avatar">
                                <?= strtoupper(substr($_SESSION['username'], 0, 1)) ?>
                            </span>
                            <a href="../auth/logout.php">Logout</a>
                        </div>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </header>
    <main class="container">
        <?php display_flash_message(); ?>
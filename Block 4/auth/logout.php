<?php
require_once '../includes/functions.php';

session_start();
session_destroy();

redirect_with_message('login.php', 'You have been logged out');
?>
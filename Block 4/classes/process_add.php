<?php
include '../includes/db_connect.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_name = sanitize_input($_POST['class_name']);
    $capacity = intval($_POST['capacity']);
    
    try {
        $stmt = $conn->prepare("INSERT INTO classes (class_name, capacity) VALUES (?, ?)");
        $stmt->bind_param("si", $class_name, $capacity);
        $stmt->execute();
        
        redirect_with_message(
            "index.php",
            "Class '$class_name' added successfully!"
        );
    } catch (mysqli_sql_exception $e) {
        redirect_with_message(
            "add.php",
            "Error: " . $e->getMessage(),
            "error"
        );
    }
}

$conn->close();
?>
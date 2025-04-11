<?php
include '../includes/db_connect.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $first_name = sanitize_input($_POST['first_name']);
    $last_name = sanitize_input($_POST['last_name']);
    $date_of_birth = $_POST['date_of_birth'];
    $class_id = intval($_POST['class_id']);
    $medical_info = sanitize_input($_POST['medical_info']);

    try {
        // Insert pupil
        $stmt = $conn->prepare("INSERT INTO pupils 
                              (first_name, last_name, date_of_birth, class_id, medical_info) 
                              VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $first_name, $last_name, $date_of_birth, $class_id, $medical_info);
        $stmt->execute();
        
        // Success message
        redirect_with_message(
            '../pupils/index.php',
            "Pupil $first_name $last_name added successfully!"
        );
    } catch (mysqli_sql_exception $e) {
        // Error message
        redirect_with_message(
            'add.php',
            "Error: " . $e->getMessage(),
            'error'
        );
    }
}

$conn->close();
?>
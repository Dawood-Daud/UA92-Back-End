<?php
$conn = new mysqli('localhost', 'root', '', 'st_alphonsus_school');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
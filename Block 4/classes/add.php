<?php
$page_title = "Add New Class";
include '../includes/header.php';
?>

<h2>Add New Class</h2>

<form action="process_add.php" method="post">
    <div class="form-group">
        <label for="class_name">Class Name:</label>
        <input type="text" id="class_name" name="class_name" required>
    </div>
    
    <div class="form-group">
        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" min="1" required>
    </div>
    
    <button type="submit" class="btn">Add Class</button>
</form>

<?php include '../includes/footer.php'; ?>
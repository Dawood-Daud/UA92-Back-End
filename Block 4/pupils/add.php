<?php 
$page_title = "Add New Pupil";
include '../includes/header.php'; 
include '../includes/db_connect.php';

// Fetch classes for dropdown
$classes = $conn->query("SELECT * FROM classes");
?>

<div class="container">
    <h2>🧒 Add New Pupil</h2>
    
    <form action="process_add.php" method="post" class="pupil-form">
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required placeholder="e.g. Harry">
            </div>
            
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required placeholder="e.g. Potter">
            </div>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Birthday:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>
        </div>

        <div class="form-group">
            <label for="class_id">Class:</label>
            <select id="class_id" name="class_id" required>
                <option value="">-- Select Class --</option>
                <?php while($class = $classes->fetch_assoc()): ?>
                    <option value="<?= $class['class_id'] ?>">
                        <?= htmlspecialchars($class['class_name']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="medical_info">Medical Notes:</label>
            <textarea id="medical_info" name="medical_info" placeholder="Allergies, conditions..."></textarea>
        </div>

        <button type="submit" class="btn">➕ Add Pupil</button>
    </form>
</div>

<?php 
$conn->close();
include '../includes/footer.php'; 
?>
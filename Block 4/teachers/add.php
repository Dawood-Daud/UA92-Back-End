<?php 
$page_title = "Add Teacher";
include '../includes/header.php'; 
include '../includes/db_connect.php';

$classes = $conn->query("SELECT * FROM classes WHERE class_id NOT IN (SELECT class_id FROM teachers WHERE class_id IS NOT NULL)");
?>

<div class="container">
    <h2>👩🏫 Add New Teacher</h2>
    
    <form action="process_add.php" method="post">
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required placeholder="e.g. Minerva">
            </div>
            
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required placeholder="e.g. McGonagall">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="teacher@school.com">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="class_id">Assign to Class:</label>
                <select id="class_id" name="class_id">
                    <option value="">-- Not assigned --</option>
                    <?php while($class = $classes->fetch_assoc()): ?>
                        <option value="<?= $class['class_id'] ?>">
                            <?= htmlspecialchars($class['class_name']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="salary">Salary (£):</label>
                <input type="number" id="salary" name="salary" step="0.01" required placeholder="30000">
            </div>
        </div>

        <div class="form-group checkbox">
            <input type="checkbox" id="background_check" name="background_check" checked>
            <label for="background_check">Background check passed</label>
        </div>

        <button type="submit" class="btn">➕ Add Teacher</button>
    </form>
</div>

<?php 
$conn->close();
include '../includes/footer.php'; 
?>
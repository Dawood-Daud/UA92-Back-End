<?php 
$page_title = "Add Parent";
include '../includes/header.php'; 
include '../includes/db_connect.php';

$pupils = $conn->query("SELECT * FROM pupils");
?>

<div class="container">
    <h2>👨👩 Add Parent/Guardian</h2>
    
    <form action="process_add.php" method="post">
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required placeholder="e.g. James">
            </div>
            
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required placeholder="e.g. Potter">
            </div>
        </div>

        <div class="form-group">
            <label for="relationship">Relationship:</label>
            <select id="relationship" name="relationship">
                <option value="Mother">Mother</option>
                <option value="Father">Father</option>
                <option value="Guardian">Guardian</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required placeholder="07123456789">
        </div>

        <div class="form-group">
            <label>Link to Pupil(s):</label>
            <div class="pupil-checkboxes">
                <?php while($pupil = $pupils->fetch_assoc()): ?>
                    <div class="checkbox-item">
                        <input type="checkbox" name="pupil_ids[]" 
                               id="pupil_<?= $pupil['pupil_id'] ?>" 
                               value="<?= $pupil['pupil_id'] ?>">
                        <label for="pupil_<?= $pupil['pupil_id'] ?>">
                            <?= htmlspecialchars($pupil['first_name'] . ' ' . $pupil['last_name']) ?>
                        </label>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <button type="submit" class="btn">➕ Add Parent</button>
    </form>
</div>

<?php 
$conn->close();
include '../includes/footer.php'; 
?>
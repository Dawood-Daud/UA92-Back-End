<?php
$page_title = "School Dashboard";
include 'includes/header.php';

include 'includes/db_connect.php';
$class_count = $conn->query("SELECT COUNT(*) FROM classes")->fetch_row()[0];
$pupil_count = $conn->query("SELECT COUNT(*) FROM pupils")->fetch_row()[0];
$teacher_count = $conn->query("SELECT COUNT(*) FROM teachers")->fetch_row()[0];
$parent_count = $conn->query("SELECT COUNT(*) FROM parents")->fetch_row()[0];
$conn->close();
?>

<h2>School Management Dashboard</h2>

<div class="dashboard-grid">
    <div class="dashboard-card">
        <h3><i class="fas fa-chalkboard"></i> Classes</h3>
        <p>Total: <?php echo $class_count; ?></p>
        <a href="classes/index.php" class="btn">Manage Classes</a>
    </div>
    
    <div class="dashboard-card">
        <h3><i class="fas fa-child"></i> Pupils</h3>
        <p>Total: <?php echo $pupil_count; ?></p>
        <a href="pupils/index.php" class="btn">Manage Pupils</a>
    </div>
    
    <div class="dashboard-card">
        <h3><i class="fas fa-users"></i> Parents</h3>
        <p>Total: <?php echo $parent_count; ?></p>
        <a href="parents/index.php" class="btn">Manage Parents</a>
    </div>
    
    <div class="dashboard-card">
        <h3><i class="fas fa-chalkboard-teacher"></i> Teachers</h3>
        <p>Total: <?php echo $teacher_count; ?></p>
        <a href="teachers/index.php" class="btn">Manage Teachers</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
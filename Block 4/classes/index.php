<?php
$page_title = "School Dashboard";
require_once 'includes/header.php';
require_once 'includes/db_connect.php';

// Get counts
$counts = [
    'classes' => $conn->query("SELECT COUNT(*) FROM classes")->fetch_row()[0],
    'pupils' => $conn->query("SELECT COUNT(*) FROM pupils")->fetch_row()[0],
    'parents' => $conn->query("SELECT COUNT(*) FROM parents")->fetch_row()[0],
    'teachers' => $conn->query("SELECT COUNT(*) FROM teachers")->fetch_row()[0]
];

// Get recent activity
$recent_pupils = $conn->query("SELECT first_name, last_name FROM pupils ORDER BY pupil_id DESC LIMIT 5");
$conn->close();
?>

<div class="dashboard-header">
    <h2>School Dashboard</h2>
    <div class="stats-grid">
        <div class="stat-card">
            <i class="fas fa-door-open"></i>
            <h3><?= $counts['classes'] ?></h3>
            <p>Classes</p>
        </div>
        <div class="stat-card">
            <i class="fas fa-child"></i>
            <h3><?= $counts['pupils'] ?></h3>
            <p>Pupils</p>
        </div>
        <div class="stat-card">
            <i class="fas fa-user-friends"></i>
            <h3><?= $counts['parents'] ?></h3>
            <p>Parents</p>
        </div>
        <div class="stat-card">
            <i class="fas fa-chalkboard-teacher"></i>
            <h3><?= $counts['teachers'] ?></h3>
            <p>Teachers</p>
        </div>
    </div>
</div>

<div class="dashboard-grid">
    <div class="card">
        <h3><i class="fas fa-clock"></i> Recent Additions</h3>
        <ul class="recent-list">
            <?php while($pupil = $recent_pupils->fetch_assoc()): ?>
                <li><?= htmlspecialchars($pupil['first_name'] . ' ' . $pupil['last_name']) ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
    
    <div class="card">
        <h3><i class="fas fa-chart-line"></i> Quick Actions</h3>
        <div class="action-buttons">
            <a href="classes/add.php" class="btn"><i class="fas fa-plus"></i> Add Class</a>
            <a href="pupils/add.php" class="btn"><i class="fas fa-user-plus"></i> Add Pupil</a>
            <a href="teachers/add.php" class="btn"><i class="fas fa-user-tie"></i> Add Teacher</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
<?php
require_once 'includes/db.php';

$activeSection = $_GET['section'] ?? 'home';

$editStudent = null;
if ($activeSection === 'update' && isset($_GET['edit_id'])) {
    $eid = intval($_GET['edit_id']);
    $r = $conn->query("SELECT * FROM students WHERE id=$eid");
    if ($r && $r->num_rows > 0) $editStudent = $r->fetch_assoc();
}

$students = [];
$r = $conn->query("SELECT * FROM students ORDER BY id");
if ($r) $students = $r->fetch_all(MYSQLI_ASSOC);

$successMsg = '';
$errorMsg   = '';
if (isset($_GET['success'])) {
    $msgs = ['1' => 'Student added successfully!', '2' => 'Student updated successfully!', '3' => 'Student deleted successfully!'];
    $successMsg = $msgs[$_GET['success']] ?? 'Done!';
}
if (isset($_GET['error'])) $errorMsg = htmlspecialchars($_GET['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Academy - Student Portal</title>
    <meta name="description" content="Student Management System Portal">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Lora:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
    <header class="school-header">
        <div class="header-container">
            <div class="header-brand">
                <a href="?section=home"><img src="images/logo.png" id="logo" alt="Mundo Academy Logo"></a>
                <a href="?section=create" class="create-btn-header <?= $activeSection === 'create' ? 'active' : '' ?>">CREATE</a>
                <a href="?section=read" class="create-btn-header <?= $activeSection === 'read' ? 'active' : '' ?>">READ</a>
                <a href="?section=update" class="create-btn-header <?= $activeSection === 'update' ? 'active' : '' ?>">UPDATE</a>
                <a href="?section=delete" class="create-btn-header <?= $activeSection === 'delete' ? 'active' : '' ?>">DELETE</a>
            </div>
        </div>
    </header>

    <main class="main-content">
    <?php
    switch ($activeSection) {
        case 'create':
            include 'views/create.php';
            break;
        case 'read':
            include 'views/read.php';
            break;
        case 'update':
            include 'views/update.php';
            break;
        case 'delete':
            include 'views/delete.php';
            break;
        case 'home':
        default:
            include 'views/home.php';
            break;
    }
    ?>
    </main>

    <footer class="school-footer">
        <div class="footer-container">
            <p>&copy; <?= date('Y') ?>  All rights reserved. Integrative Programming Technologies Project.</p>
        </div>
    </footer>

    <div id="custom-modal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modal-title">Confirmation</h3>
            </div>
            <div class="modal-body">
                <p id="modal-message">Are you sure you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button id="modal-cancel" class="btns">Cancel</button>
                <button id="modal-confirm" class="btns delbtn">Confirm</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

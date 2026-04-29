<?php
require_once 'db.php';

$id = intval($_POST['id'] ?? 0);

if ($id > 0) {
    if ($conn->query("DELETE FROM students WHERE id=$id")) {
        if ($conn->affected_rows > 0) {
            header("Location: ../index.php?success=3&section=delete");
        } else {
            header("Location: ../index.php?error=No+student+found+with+that+ID.&section=delete");
        }
    } else {
        header("Location: ../index.php?error=" . urlencode($conn->error) . "&section=delete");
    }
} else {
    header("Location: ../index.php?error=Invalid+ID+provided&section=delete");
}
exit;
?>

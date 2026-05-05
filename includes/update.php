<?php
require_once 'db.php';

$id             = intval($_POST['id'] ?? 0);
$name           = $conn->real_escape_string(trim($_POST['name'] ?? ''));
$surname        = $conn->real_escape_string(trim($_POST['surname'] ?? ''));
$middlename     = $conn->real_escape_string(trim($_POST['middlename'] ?? ''));
$address        = $conn->real_escape_string(trim($_POST['address'] ?? ''));
$contact_number = $conn->real_escape_string(trim($_POST['contact_number'] ?? ''));

$sql = "UPDATE students SET name='$name', surname='$surname', middlename='$middlename',
        address='$address', contact_number='$contact_number' WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: ../index.php?success=2&section=update");
} else {
    header("Location: ../index.php?error=" . urlencode($conn->error) . "&section=update");
}
exit;
?>

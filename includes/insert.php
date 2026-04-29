<?php
require_once 'db.php';

$name           = $conn->real_escape_string(trim($_POST['name'] ?? ''));
$surname        = $conn->real_escape_string(trim($_POST['surname'] ?? ''));
$middlename     = $conn->real_escape_string(trim($_POST['middlename'] ?? ''));
$address        = $conn->real_escape_string(trim($_POST['address'] ?? ''));
$contact_number = $conn->real_escape_string(trim($_POST['contact_number'] ?? ''));

$sql = "INSERT INTO students (name, surname, middlename, address, contact_number)
        VALUES ('$name', '$surname', '$middlename', '$address', '$contact_number')";

if ($conn->query($sql)) {
    header("Location: ../index.php?success=1&section=create");
} else {
    header("Location: ../index.php?error=" . urlencode($conn->error) . "&section=create");
}
exit;
?>

<?php
include 'connection.php';

$title = $_POST['title'];
$description = $_POST['description'];
$remember_date = $_POST['remember_date'];

$conn-> query("INSERT INTO `notes` (`title`, `description`, `remember_date`) VALUES('$title', '$description', '$remember_date')");

$conn->close();
echo '<script>window.location.href = "index.php";</script>';
?>
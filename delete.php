<?php 
    include 'connection.php';
    $note_id = $_GET['note_id'];

        $sql = "DELETE FROM notes WHERE id=$note_id;";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo '<script>window.location.href = "index.php";</script>';
            exit();
        } 
        else {
            echo "Error deleting record: " . $conn->error;
            exit();
        }

    $conn->close();
    echo '<script>window.location.href = "index.php";</script>';
?>

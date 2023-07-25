<?php
    session_start();
    include "database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_POST["user_id"];

        if ($_SESSION["user_role"] != 1) {
            echo "You do not have permission to delete users.";
            exit;
        }

        // Perform the deletion query here
        $sql = "DELETE FROM users WHERE id = '$user_id'";
        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully.";
        } else {
            echo "Error deleting user: Something went wrong";
        }
    }
?>

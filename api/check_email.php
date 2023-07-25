<?php
session_start();
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $res = array(
            'status' => 401,
            'message' => 'Email must be filled correctly'
        );
        echo json_encode($res);
    } else {
        $email = mysqli_real_escape_string($conn, $email);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $data = array(
                "status" => 200,
                "message" => "Email exists"
            );
            echo (json_encode($data));
        } else {
            $data = array(
                "status" => 400,
                "message" => "Email does not exist"
            );
            echo (json_encode($data));
        }
    }
}
?>

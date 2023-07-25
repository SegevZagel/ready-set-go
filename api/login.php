<?php
session_start();
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $res = array(
            'status' => 401,
            'message' => 'All fields are required'
        );
        echo json_encode($res);
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $user = $conn->query($sql)->fetch_assoc();

            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["user_role"] = $user["role"];

                $data = array(
                    "status" => 200,
                    "message" => "Login successful!"
                );

                echo (json_encode($data));
            } else {
                $data = array(
                    "status" => 401,
                    "message" => "Invalid password. Please try again."
                );

                echo (json_encode($data));
            }
        }
    }
?>

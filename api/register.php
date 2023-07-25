<?php
session_start();
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if (empty($email) || empty($password) || empty($confirm)) {
        $res = array(
            'status' => 401,
            'message' => 'All fields are required'
        );
        echo json_encode($res);
    } elseif ($password !== $confirm) {
        $res = array(
            'status' => 400,
            'message' => 'Passwords do not match'
        );
        echo json_encode($res);
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailResult = $conn->query($checkEmailQuery);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO users (email, password, role) VALUES ('$email', '$hashedPassword', '0')";

            if ($conn->query($insertQuery) === TRUE) {
                $_SESSION["user_id"] = $conn->insert_id;
                $_SESSION["user_email"] = $email;
                $_SESSION["user_role"] = '0';

                $data = array(
                    "status" => 200,
                    "message" => "Registration successful!"
                );
                echo (json_encode($data));
            } else {
                $data = array(
                    "status" => 500,
                    "message" => "Error: Something went wrong" 
                );
                echo (json_encode($data));
            }
        }
    }
?>

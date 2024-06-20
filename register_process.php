<?php
    session_start();

    include_once "db_connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($username) || empty($email) || empty($password)) {
            $_SESSION["error"] = "All fields are required.";
            header("Location: register.php");
            exit();
        }

        $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION["error"] = "Username or email already exists.";
            header("Location: register.php");
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION["success"] = "Registration successful! Please login.";
        } else {
            $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error; 
        }
        header("Location: register.php");
        exit();
    } else {
        echo "Form was not submitted.";
    }

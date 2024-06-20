<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eshop_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Έλεγχος σύνδεσης
    if ($conn->connect_error) {
        die("Αποτυχία σύνδεσης: " . $conn->connect_error);
    }

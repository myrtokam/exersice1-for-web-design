<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Αρχική Σελίδα - Ηλεκτρονικό Κατάστημα</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/icon.png">
</head>

<body>
    <header style ="background-color: #B3A492;">
        <?php include 'navigation.php';
        session_start(); ?>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="cart-button">
                <p id="cartText">Καλάθι</p>
                <a href="cart.php">
                    <img src="images/cart.jpg" id="cartImageLink">
                </a>
            </div>
        <?php else: ?>
        <?php endif; ?>
            <p >Για να χρησιμοποιήσετε το καλάθι αγορών, παρακαλούμε <a href="login.php"style= "color: #160D03;">συνδεθείτε</a>.</p>
    </header>
    <main style ="background-color: #DADDB1;">
        <h1>Καλώς ήρθατε Κατάστημα μας</h1>
        <p>Εδώ μπορείτε να βρείτε μια μεγάλη ποικιλία από προϊόντα για κάθε ανάγκη σας.</p><br>
        <p>Ότι χρειάζεστε σε συσκευές κινητών, υπολογιστών και φωτογραφικών μηχανών θα το βρείτε σε εμας.</p>
       
        <div style="width: 100%; display: flex; flex-wrap: wrap; background-color: #DADDB1;">
        <?php
        include 'db_connection.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
            if (isset($_SESSION['username'])) {
                $productId = $_POST['product_id'];
                $username = $_SESSION['username'];

                $userSql = "SELECT user_id FROM users WHERE username = '$username'";
                $userResult = $conn->query($userSql);

                if ($userResult && $userResult->num_rows > 0) {
                    $userRow = $userResult->fetch_assoc();
                    $userId = $userRow['user_id'];

                    $checkSql = "SELECT * FROM cart WHERE user_id = '$userId' AND product_id = '$productId'";
                    $checkResult = $conn->query($checkSql);

                    if ($checkResult && $checkResult->num_rows > 0) {
                        $row = $checkResult->fetch_assoc();
                        $cartId = $row['cart_id'];
                        $quantity = $row['quantity'] + 1;

                        $updateSql = "UPDATE cart SET quantity = '$quantity' WHERE cart_id = '$cartId'";
                        $conn->query($updateSql);
                    } else {
                        $insertSql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$userId', '$productId', '1')";
                        $conn->query($insertSql);
                    }

                    $_SESSION['cart'][] = $productId;

                    echo "<div class='success'>Το προϊόν προστέθηκε στο καλάθι αγορών.</div>";
                } else {
                    echo "<div class='error'>Σφάλμα κατά την ανάκτηση του user_id.</div>";
                }
            } else {
                echo "<div class='error'>Για να προσθέσετε προϊόντα στο καλάθι, παρακαλούμε <a href='login.php'>συνδεθείτε</a>.</div>";
            }
        }


        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Προσθέτω το style='width: 50%;' για να καταλαμβάνει κάθε προϊόν το μισό του container
                echo "<div class='product' style='width: 50%;'>";
                echo "<img src='images/" . $row["image"] . "' alt='" . $row["name"] . "'>";
                echo "<h2>" . $row["name"] . "</h2>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Τιμή: €" . $row["price"] . "</p>";
                echo "<form action='' method='POST'>";
                echo "<input type='hidden' name='product_id' value='" . $row["product_id"] . "'>";
                echo "<button type='submit' name='add_to_cart' style='background-color: #D6C7AE; color: black;'>Προσθήκη στο Καλάθι</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "Δεν βρέθηκαν προϊόντα.";
        }

        $conn->close();
        ?>
       </div>
    </main>
    <footer style='background-color: #BFB29E; color: black;'>
    <div style="display: flex; justify-content: space-between; padding: 20px; background-color: #BFB29E;">
        <div>
            <h3>Διεύθυνση</h3>
            <p>Οδός Εξαμπλωμάτων 5, Αθήνα, 11521</p>
        </div>
        <div>
            <h3>Επικοινωνία</h3>
            <p>Σταθερό: 210 1234567</p>
            <p>Κινητό: 690 1234567</p>
            <p>Email: info@techshop.gr</p>
        </div>
        <div>
            <h3>Πληροφορίες</h3>
            <p>Όλα τα προϊόντα μας συνοδεύονται από γραπτή εγγύηση ποιότητας.</p>
            <p>Διαθέτουμε μια ευρεία ποικιλία σε κινητούς υπολογιστές και φωτογραφικές μηχανές.</p>
        </div>
    </div>
    <p style="text-align: center;">&copy; 2024 Μυρσίνη Κάμπα. Όλα τα δικαιώματα επιφυλασσόμενα.</p>
</footer>

</body>

</html>
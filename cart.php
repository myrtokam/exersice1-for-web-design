
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

$totalPrice = 0;

// Fetch products from the cart table in the database
$username = $_SESSION['username'];

$userSql = "SELECT user_id FROM users WHERE username = '$username'";
$userResult = $conn->query($userSql);

if ($userResult && $userResult->num_rows > 0) {
    $userRow = $userResult->fetch_assoc();
    $userId = $userRow['user_id'];

    $cartSql = "SELECT * FROM cart WHERE user_id = '$userId'";
    $cartResult = $conn->query($cartSql);


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Καλάθι Αγορών</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header style="background-color: #B3A492;">
            <?php include 'navigation.php'; ?>
        </header>
        <div class="container">
            <h2>Καλάθι Αγορών</h2>
            <ul class="cart-list">
                <?php while ($row = $cartResult->fetch_assoc()): ?>
                    <?php
                    $productId = $row['product_id'];
                    $productQuantity = $row['quantity'];

                    $productSql = "SELECT * FROM products WHERE product_id = '$productId'";
                    $productResult = $conn->query($productSql);

                    if ($productResult && $productResult->num_rows > 0) {
                        $productRow = $productResult->fetch_assoc();
                        $productName = $productRow["name"];
                        $productPrice = $productRow["price"] * $productQuantity;
                        $totalPrice += $productPrice;
                    }
                    ?>
                    <li class="cart-item">
                        <div class="product-details">
                            <p class="product-name"><?php echo $productName; ?></p>
                            <p class="product-quantity">Ποσότητα: <?php echo $productQuantity; ?></p>
                            <p class="product-price">Τιμή: €<?php echo $productPrice; ?></p>
                        </div>
                        <form action="cart.php" method="GET">
                            <input type="hidden" name="remove" value="<?php echo $row['cart_id']; ?>">
                            <button type="submit" class="remove-btn">Αφαίρεση</button>
                        </form>
                    </li>
                <?php endwhile; ?>
                <li class="cart-item total">
                    <p class="total-label">Συνολική Τιμή:</p>
                    <p class="total-price">€<?php echo $totalPrice; ?></p>
                </li>
            </ul>
        </div>
      
     

    </body>
    
    <?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

$totalPrice = 0;

// Fetch products from the cart table in the database
$username = $_SESSION['username'];

$userSql = "SELECT user_id FROM users WHERE username = '$username'";
$userResult = $conn->query($userSql);

if ($userResult && $userResult->num_rows > 0) {
    $userRow = $userResult->fetch_assoc();
    $userId = $userRow['user_id'];

    $cartSql = "SELECT * FROM cart WHERE user_id = '$userId'";
    $cartResult = $conn->query($cartSql);


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Καλάθι Αγορών</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header style="background-color: #B3A492;">
            <?php include 'navigation.php'; ?>
        </header>
        <div class="container">
            <h2>Καλάθι Αγορών</h2>
            <ul class="cart-list">
                <?php while ($row = $cartResult->fetch_assoc()): ?>
                    <?php
                    $productId = $row['product_id'];
                    $productQuantity = $row['quantity'];

                    $productSql = "SELECT * FROM products WHERE product_id = '$productId'";
                    $productResult = $conn->query($productSql);

                    if ($productResult && $productResult->num_rows > 0) {
                        $productRow = $productResult->fetch_assoc();
                        $productName = $productRow["name"];
                        $productPrice = $productRow["price"] * $productQuantity;
                        $totalPrice += $productPrice;
                    }
                    ?>
                    <li class="cart-item">
                        <div class="product-details">
                            <p class="product-name"><?php echo $productName; ?></p>
                            <p class="product-quantity">Ποσότητα: <?php echo $productQuantity; ?></p>
                            <p class="product-price">Τιμή: €<?php echo $productPrice; ?></p>
                        </div>
                        <form action="cart.php" method="GET">
                            <input type="hidden" name="remove" value="<?php echo $row['cart_id']; ?>">
                            <button type="submit" class="remove-btn">Αφαίρεση</button>
                        </form>
                    </li>
                <?php endwhile; ?>
                <li class="cart-item total">
                    <p class="total-label">Συνολική Τιμή:</p>
                    <p class="total-price">€<?php echo $totalPrice; ?></p>
                </li>
            </ul>
        </div>
      
       <br>

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
    <?php

} else {
    echo "<div class='error'>Σφάλμα κατά την ανάκτηση του user_id.</div>";
}

if (isset($_GET['remove'])) {
    $removeId = $_GET['remove'];

    $deleteSql = "DELETE FROM cart WHERE cart_id = '$removeId'";
    if ($conn->query($deleteSql) === TRUE) {
        header("Location: cart.php");
        exit();
    } else {
        echo "<div class='error'>Σφάλμα κατά την αφαίρεση του προϊόντος από το καλάθι.</div>";
    }
}

$conn->close();
?>
    </html>
    <?php

} else {
    echo "<div class='error'>Σφάλμα κατά την ανάκτηση του user_id.</div>";
}

if (isset($_GET['remove'])) {
    $removeId = $_GET['remove'];

    $deleteSql = "DELETE FROM cart WHERE cart_id = '$removeId'";
    if ($conn->query($deleteSql) === TRUE) {
        header("Location: cart.php");
        exit();
    } else {
        echo "<div class='error'>Σφάλμα κατά την αφαίρεση του προϊόντος από το καλάθι.</div>";
    }
}

$conn->close();
?>
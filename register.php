<!DOCTYPE html>
<html lang="en">

<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body <header style="background-color: #DADDB1;">>
    <header style="background-color: #B3A492;">
        <?php include 'navigation.php'; session_start();?>
    </header>
    <div class="container">
        <form action="register_process.php" method="POST" class="register-form">
            <h2>Εγγραφή</h2>
            
            <div class="form-group">
                <label for="username">Όνομα Χρήστη:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Κωδικός:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if (isset($_SESSION["error"])): ?>
                <div class="error"><?php echo $_SESSION["error"]; ?></div>
                <?php unset($_SESSION["error"]); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION["success"])): ?>
                <div class="success"><?php echo $_SESSION["success"]; ?></div>
                <?php unset($_SESSION["success"]); ?>
            <?php endif; ?>
            <button type="submit">Εγγραφή</button>  <br>  <br>
            <p>Καλώς ήρθατε στο κατάστημα μας, τον απόλυτο προορισμό για κάθε ενθουσιώδη τεχνολογίας! Εγγραφείτε σήμερα για να αποκτήσετε πρόσβαση σε μια εκπληκτική ποικιλία από κινητά τηλέφωνα, 
                φορητούς υπολογιστές και φωτογραφικές μηχανές. Ως μέλη της κοινότητάς μας, θα λαμβάνετε ειδοποιήσεις για αποκλειστικές προσφορές, εκπτώσεις και τα τελευταία νέα σχετικά με τα πιο σύγχρονα προϊόντα.</p>
       <br>
       <p>
Γίνετε Μέλος της Κοινότητάς μας!

Εγγραφείτε σήμερα για να αποκτήσετε πρόσβαση σε μια εκπληκτική ποικιλία από κινητά τηλέφωνα, φορητούς υπολογιστές και φωτογραφικές μηχανές. 
Ως μέλη της κοινότητάς μας, θα λαμβάνετε ειδοποιήσεις για αποκλειστικές προσφορές, εκπτώσεις και τα τελευταία νέα σχετικά με τα πιο σύγχρονα προϊόντα.

Μην χάσετε την ευκαιρία να είστε πάντα ενημερωμένοι με τις τελευταίες τεχνολογικές τάσεις και να επωφεληθείτε από τις καλύτερες προσφορές μας. Η διαδικασία εγγραφής είναι γρήγορη και εύκολη,
 απλά πατήστε το κουμπί "Εγγραφή" και συμπληρώστε τα στοιχεία σας. Έλατε να ανακαλύψετε τον τεχνολογικό κόσμο μαζί μας!</p>
         
<br>
</form>
    </div>
    </div>
    <br> <br> 
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
    <p style="text-align: center;">&copy; 2024 Μυρσίνη Κάμπα. Όλα τα δικαιώματα επιφυλασσόμενα.</p>  <br>
</footer>
    
</body>

</html>
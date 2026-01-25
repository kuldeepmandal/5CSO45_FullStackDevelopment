<?php
require 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$email) {
        $message = "Invalid email format.";
    } elseif (empty($password) || strlen($password) < 6) {
        $message = "Password must be at least 6 characters.";
    } else {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':password' => $hashedPassword
            ]);

            $message = "Signup successful. Redirecting to login...";
            header("refresh:2; url=login.php");

        } catch (Exception $e) {
            $message = "Something went wrong.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Signup</h2>

    <p class="success"><?php echo htmlspecialchars($message); ?></p>

    <form method="POST">
        <label>Email</label>
        <input type="text" name="email" required>

        <br><br>

        <label>Password</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit">Signup</button>
    </form>

    <a href="login.php">Go to Login</a>
</div>

</body>
</a>

</body>
</html>

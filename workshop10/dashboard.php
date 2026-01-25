<?php
require 'session.php';
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT email FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $_SESSION['user_id']]);
$user = $stmt->fetch();

$email = $user ? htmlspecialchars($user['email']) : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-box">
    <h1>Welcome</h1>
    <p>Logged in user: <strong><?php echo $email; ?></strong></p>

    <form method="POST" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</div>


</body>
</html>

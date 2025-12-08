<?php

$success = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm_password"];

    if ($name === "") {
        $errors["name"] = "Name is required";
    }

    if ($email === "") {
        $errors["email"] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email";
    }

    if ($password === "") {
        $errors["password"] = "Password is required";
    }

    if ($password !== $confirm) {
        $errors["confirm"] = "Passwords do not match";
    }

    if (empty($errors)) {
        $file = "users.json";

        $existing = json_decode(file_get_contents($file), true);

        if (!is_array($existing)) {
            $existing = [];
        }

        $existing[] = [
            "name" => $name,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ];

        file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT));

        $success = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        .error{color:red;}
        .success{color:green;}
    </style>
</head>
<body>

<h2>User Registration</h2>

<?php if ($success): ?>
    <p class="success"><?= $success ?></p>
<?php endif; ?>

<form method="post">
    <label>Name</label><br>
    <input type="text" name="name">
    <div class="error"><?= $errors["name"] ?? "" ?></div><br>

    <label>Email</label><br>
    <input type="text" name="email">
    <div class="error"><?= $errors["email"] ?? "" ?></div><br>

    <label>Password</label><br>
    <input type="password" name="password">
    <div class="error"><?= $errors["password"] ?? "" ?></div><br>

    <label>Confirm Password</label><br>
    <input type="password" name="confirm_password">
    <div class="error"><?= $errors["confirm"] ?? "" ?></div><br>

    <button type="submit">Register</button>
</form>

</body>
</html>

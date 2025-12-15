<?php
$name = "John Doe";
$email = "john@example.com";
$message = "Hello there!";

$name = htmlspecialchars(trim($name));
$email = htmlspecialchars(trim($email));
$message = htmlspecialchars(trim($message));

$file = fopen("contacts.csv", "a");
fputcsv($file, [$name, $email, $message]);
fclose($file);

$rows = [];
if (file_exists("contacts.csv")) {
    $file = fopen("contacts.csv", "r");
    while (($data = fgetcsv($file)) !== false) {
        $rows[] = $data;
    }
    fclose($file);
}
?>
<!DOCTYPE html>
<html>
<body>

<h3>Saved Contact:</h3>
<p><?php echo $name . " | " . $email . " | " . $message; ?></p>

<h3>All Contacts</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
    </tr>

    <?php foreach ($rows as $r): ?>
        <tr>
            <td><?php echo $r[0]; ?></td>
            <td><?php echo $r[1]; ?></td>
            <td><?php echo $r[2]; ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

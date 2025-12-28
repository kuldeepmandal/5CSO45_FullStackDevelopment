<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main-title">Library Management System</div>
<h2>Search by Category</h2>

<form method="post">
    <input type="text" name="category" placeholder="Enter category">
    <button>Search</button>
</form>

<?php
if (isset($_POST['category'])) {
    $cat = $_POST['category'];

    $sql = "SELECT * FROM books WHERE category='$cat'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>";
        echo $row['title']." | ".$row['author']." | ".$row['quantity'];
        echo " <a href='delete_book.php?id=".$row['book_id']."'>Delete</a>";
        echo "</p>";
    }
}
?>

</body>
</html>

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Kayndie's Coffee Shop</title>
</head>
<body>
<center>
<div class="header">
    <a href="index.php">
        <h1>Kayndie's Coffee Shop</h1>
    </a>
	<a href="logout.php" style="color: white">Logout</a>

</div>

<div class="content">
    <h2>Barista Registration</h2>
    <h3>Sign up</h3>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="barista_name">Barista Name:</label>
            <input type="text" name="barista_name" required>
        </p>
        <p>
            <label for="experience_level">Experience Level:</label>
            <input type="text" name="experience_level" required>
        </p>
        <p>
            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" required>
        </p>
        <input type="submit" name="insertBaristaBtn" value="Register">
    </form>
</div>

<h2 style="border-bottom: 1px solid black;">List of Baristas</h2>
<!-- List of Baristas -->
<div class="ListOfBarista">
    <?php 
    $getAllBaristas = getAllBaristas($pdo);
    if ($getAllBaristas) {
        foreach ($getAllBaristas as $row) { ?>
            <div class="container">
                <h3><?php echo htmlspecialchars($row['barista_name']); ?></h3>
                <p>Experience Level: <?php echo htmlspecialchars($row['experience_level']); ?></p>
                <p>Contact Number: <?php echo htmlspecialchars($row['contact_number']); ?></p>
                <button style="background-color: lightblue; border-color: lightblue; color:black"><a href="viewproduct.php?barista_id=<?php echo $row['barista_id']; ?>">View</a></button>
                <button style="background-color: lightblue; border-color: lightblue; color:black"><a href="editbarista.php?barista_id=<?php echo $row['barista_id']; ?>">Edit</a></button>
                <button style="background-color: lightblue; border-color: lightblue; color:black"><a href="deletebarista.php?barista_id=<?php echo $row['barista_id']; ?>">Delete</a></button>
            </div>
        <?php }
    } else {
        echo "<p>No baristas found.</p>";
    }
    ?>
</div>

</center>
</body>
</html>

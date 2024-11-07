<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'core/dbConfig.php';
require_once 'core/models.php';

$barista_id = $_GET['barista_id'];


$barista = getBaristaByID($pdo, $barista_id);
$product = getProductByBarista($pdo, $barista_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barista's Coffee</title>
	 <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<center>
<body>
<div class="header">
	<a href="index.php">
		<h1>Kaynie's Restaurant</h1>
	</a>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <a href="logout.php">Logout</a>
	</div>

<h2>Coffee by <?php echo htmlspecialchars($barista['barista_name']); ?></h2>

<button onclick="document.getElementById('addProductForm').style.display='block'">Add Coffee</button>

<div id="addProductForm" class="product">
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="barista_id" value="<?php echo $barista_id; ?>">
        
        <p>
            <label for="product_name">Coffee Name:</label>
            <input type="text" name="product_name">
        </p>
        
        <p>
            <label for="price">price:</label>
            <input type="text" name="price" >
        </p>
        
        <button type="submit" name="addProductBtn">Confirm</button>
    </form>
</div>
<h3>Coffee List:</h3>
<?php if (count($product) === 0) {
   echo("<p style=color:gray;>List is empty. Try adding a new coffee!</p>");
}
?>
<ul>
    <?php foreach ($product as $products): ?>
        <li>
            <h1><?php echo htmlspecialchars($products['product_name']); ?></h1>
            <h3>Price: <?php echo htmlspecialchars($products['price']); ?></h3>
				<button style="background-color: lightblue; border-color: lightblue; color:black"><a href="editproduct.php?product_id=<?php echo $products['product_id']; ?>">Edit</a></button>
				<button style="background-color: lightblue; border-color: lightblue; color:black"><a href="deleteproduct.php?product_id=<?php echo $products['product_id']; ?>">Delete</a></button>
        </li>
        <hr>
    <?php endforeach; ?>
</ul>
</center>

</body>
</html>
<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
	<center>
<div class="header">
	<a href="index.php">
		<h1>Kayndie's Restaurant</h1>
	</a>
	</div>
	<?php $getProductByID = getProductByID($pdo, $_GET['product_id']); ?>
	<h2>Edit Coffee</h2>
   <form action="core/handleForms.php?product_id=<?php echo $_GET['product_id']; ?>" method="POST">

		<p>
			<label for="product_name">Coffee Name</label> 
			<input type="text" name="product_name" value="<?php echo $getProductByID['product_name']; ?>">
		</p>
		<p>
			<label for="price">Price</label> 
			<input type="text" name="price" value="<?php echo $getProductByID['price']; ?>">
		</p>
		<div class="ebtn">
      <input type="hidden" name="barista_id" value="<?php echo htmlspecialchars($getProdutByID['barista_id']); ?>">
		<input type="submit" name="editProductBtn">
		</div>
      </form>
	  </center>
</body>
</html>
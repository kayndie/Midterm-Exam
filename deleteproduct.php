<?php require_once 'core/dbConfig.php'; ?>
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
<h2>Are you sure you want to delete this dish?</h2>   

	<?php $getProductByID = getProductByID($pdo, $_GET['product_id']); ?>
	<div class="container delete">
		<h3>Product name: <?php echo $getProductByID['product_name']; ?></h3>
		<h3>price: <?php echo $getProductByID['price']; ?></h3>
		<div class="dltbtn">
      <form action="core/handleForms.php?dishes_id=<?php echo $_GET['product_id']; ?>" method="POST">
      <input type="hidden" name="baristaID" value="<?php echo htmlspecialchars($getProductByID['barista_id']); ?>">

         <input type="submit" name="deleteProductBtn" value="Confirm">
      </form>
	
		</div>	
	</div>
</center>


</body>
</html>
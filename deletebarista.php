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
		<h1>Kayndie's Coffee Shop</h1>
	</a>
	</div>
	</center>
	<center>
<h2>Are you sure you want to delete?</h2>
</center>
<center>
	<?php $getBaristaByID = getBaristaByID($pdo, $_GET['barista_id']); ?>
	<div class="container delete">
		<h3>Barista name: <?php echo $getBaristaByID['barista_name']; ?></h3>
		<h3>Experience level: <?php echo $getBaristaByID['experience_level']; ?></h3>
		<h3>Contact number: <?php echo $getBaristaByID['contact_number']; ?></h3>

		<div class="dltbtn">
			<form action="core/handleForms.php?barista_id=<?php echo $_GET['barista_id']; ?>" method="POST">
				<input type="submit" name="deleteBaristaBtn" value="Confirm">
			</form>			
		</div>	
	</div>
	</center>
</body>
</html>
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
<?php $getChefByID = getBaristaByID($pdo, $_GET['barista_id']); ?>
	<h2>Barista Profile</h2>
	<form action="core/handleForms.php?barista_id=<?php echo $_GET['barista_id']; ?>" method="POST">
		<p>
			<label for="barista_name">Barista Name</label> 
			<input type="text" name="barista_name" value="<?php echo $getBaristaByID['barista_name']; ?>">
		</p>
		<p>
			<label for="experience_level">Experiene Level</label> 
			<input type="text" name="experience_level" value="<?php echo $getBaristaByID['experience_level']; ?>">
		</p>
		<p>
			<label for="contact_number">Contact Number</label> 
			<input type="text" name="contact_number" value="<?php echo $getBaristaByID['contact_number']; ?>">
		</p>
		<div class="ebtn">
		<input type="submit" name="editBaristaBtn">
		</div>
	</form>
	</center>
</body>
</html>
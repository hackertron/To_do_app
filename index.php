<?php

	require_once'app/init.php';

	$itemsQuery = $db->prepare("

		SELECT id,name,done
		FROM items
		WHERE user = :user
	");

	$itemsQuery->execute([

		'user' => $_SESSION['user_id']

	]);

	$items = $itemsQuery->rowcount() ? $itemsQuery : [];

	foreach ($items as $item) {
		# code...
		print_r($item);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>To Do</title>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="main.css">
			<link href="http://fonts.googleapis.com/css?family=Open+Sans|Shadows+Into+Light+Two" rel="stylesheet">﻿

			<meta name="viewport" content="width=device-width , initial-scale=1.0">

	</head>
	<body>

	<div class="list">
		
		<h1 class="header">To Do.</h1>

		<?php if(!empty($items)): ?>

		<ul class="items">
		<?php foreach($items as $item): ?>
			<li>
				<span class="item<?php echo $item['done'] ? ' done' : '' ; ?>">
					<?php echo $item['name']; ?>
				</span>
				<?php if(!$item['done']): ?>
					<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as Done</a>
				<?php endif ?>
			</li>
		<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<p> You Haven't added any items yet </p>
	<?php endif; ?>
		<form  class = "item-add" action="add.php" method="post">
			
			<input type="text" name="name" placeholder="Type new item here" class="input" autocomplete="off" required>

			<input type="submit" value="add" class="submit">


		</form>

	</div>

	</body>
</html>
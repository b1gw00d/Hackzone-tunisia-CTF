<?php include 'includes/header.php'; ?>
<?php

$db = new Database();

$query = "SELECT challenges.*, categories.name FROM challenges
		  INNER JOIN categories
		  ON challenges.categ = categories.name
		  ORDER BY challenges.id ";
$posts = $db->select($query);


$query = "SELECT * FROM categories
		  ORDER BY name ";
$categories = $db->select($query);

?>
<table class="table table-striped">
	<tr>
		<th>Challenge ID#</th>
		<th>Challenge  Name</th>
		<th>Category</th>
		<th>flag</th>
		<th>Score</th>
	</tr>
	
	<?php 

	if($posts) :
	 while($row = $posts->fetch_assoc()) : ?>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><a href="edit_challenge.php?id=<?php echo $row['id']; ?>"><?php echo $row['surname']; ?></td>
		<td><?php echo $row['categ']; ?></td>
		<td><?php echo $row['flag']; ?></td>
		<td><?php echo $row['score']; ?></td>
	</tr>
	<?php endwhile;?>
	<?php else: ?>
	<p>There are no posts yet</p>
<?php endif; ?>
</table>


<table class="table table-striped">
	<tr>
		<th>Category ID#</th>
		<th>Category Name</th>
	</tr>
	
	<?php 
	if($categories) :
	while($row = $categories->fetch_assoc()) : ?>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></td>
	</tr>
	<?php endwhile; ?>
	<?php else: ?>
	<p>There are no categories yet</p>
<?php endif; ?>
</table>
		
<?php include 'includes/footer.php'; ?>
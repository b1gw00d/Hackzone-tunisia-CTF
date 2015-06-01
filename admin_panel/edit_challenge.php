<?php include 'includes/header.php'; ?>
<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$id = strip_tags($id);
    $id = mysql_real_escape_string($id);
    $id = htmlspecialchars($id);
	
	$db = new Database();
	
// get one post
	$query = "SELECT * FROM challenges WHERE id = ".$id;
	$post = $db->select($query);
	if($post) {
		$post = $db->select($query)->fetch_assoc();
		// get categories
		$query = "SELECT * FROM categories";
		$categories = $db->select($query);
	}
	else {
		$post =false;
		$categories = false;
	}
}
?>

<?php if(isset($_POST['submit'])){
		//assign vars
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$mission = mysqli_real_escape_string($db->link, $_POST['mission']);
		$hint = mysqli_real_escape_string($db->link, $_POST['hint']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);
		$flag = mysqli_real_escape_string($db->link, $_POST['flag']);
		$score = mysqli_real_escape_string($db->link, $_POST['score']);
		//simple validation
		if($name == '' || $mission == ''|| $hint == '' || $category == '' || $score == '' ){
			//set error
			$error = 'Please fill out all required fields.';
		} else {
			$query = "UPDATE challenges SET
					  surname = '$name',
					  miss = '$mission',
					  hint = '$hint',
					  flag = '$flag',
					  categ = '$category',
					  score = '$score'
					  WHERE id =".$id;
			$update_row = $db->update($query);
		}
	}
?>

<!-- delete post -->
<?php if(isset($_POST['delete'])){
	$query = "DELETE FROM challenges WHERE id = ".$id;
	
	$delete_row = $db->delete($query);	
}?>

<form role="form" method="post" action="edit_challenge.php?id=<?php echo $id; ?>">

	<div class="form-group">
		<label>Challenge Name</label>
		<input name="name" type="text" class="form-control" placeholder="Enter Name" value="<?php echo $post['surname']; ?>">
	</div>
	
	<div class="form-group">
		<label>Challenge Mission</label>
		<textarea name="mission" type="text" class="form-control" rows="5" placeholder="Enter Mission">
			<?php echo $post['miss']; ?>
		</textarea>
	</div>
	<div class="form-group">
		<label>Challenge Hint</label>
		<input name="hint" type="text" class="form-control" placeholder="Enter Hint" value="<?php echo $post['hint']; ?>">
	</div>
		<div class="form-group">
		<label>MD5 flag</label>
		<input name="flag" type="text" class="form-control" placeholder="Enter flag" value="<?php echo $post['flag']; ?>">
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category" class="form-control">
			<?php while($row = $categories->fetch_assoc()) : ?>
			<?php if($row['name'] == $post['categ']) {
				$selected = 'selected';
			} else {
				$selected = '';
			}?>
			<option value="<?php echo $row['name']; ?>" <?php echo $selected; ?>><?php echo $row['name']?></option>
			<?php endwhile; ?>
		</select>
	</div>
	
	<div class="form-group">
		<label>Score</label>
		<input name="score" type="text" class="form-control" placeholder="Enter Score" value="<?php echo $post['score']; ?>">
	</div>
	
	<div>
	<input name="submit" type="submit" class="btn btn-default" value="Submit" />
	<a href="index.php" class="btn btn-default">Cancel</a>
	<input name="delete" type="submit" class="btn btn-danger" value="Delete" />
	</div>
	<br>
</form>

<?php include 'includes/footer.php'; ?>
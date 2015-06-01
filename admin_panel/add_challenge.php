<?php include 'includes/header.php'; ?>
<?php
	$db = new Database();  // create db object
	
	if(isset($_POST['submit'])){
		//assign vars
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$mission = mysqli_real_escape_string($db->link, $_POST['mission']);
		$hint = mysqli_real_escape_string($db->link, $_POST['hint']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);
		$flag = mysqli_real_escape_string($db->link, $_POST['flag']);
		$score = mysqli_real_escape_string($db->link, $_POST['score']);
		//simple validation
		if($name == '' || $mission == ''|| $hint == '' || $category == '' 
			|| $flag == '' || $score == ''){
			//set error
			$error = 'Please fill out all required fields.';
		} else {
			$query = "INSERT INTO challenges(surname, miss,hint,categ,flag,score)
					  VALUES('$name', '$mission','$hint','$category','$flag','$score')";
			$insert_row = $db->insert($query);
		}
	}
	
	
	$query = "SELECT * FROM categories";  // create query
	$categories = $db->select($query);  //run query
?>
<form role="form" method="post" action="add_challenge.php">

	<div class="form-group">
		<label>Challenge Name</label>
		<input name="name" type="text" class="form-control" placeholder="Enter Name">
	</div>
	
	<div class="form-group">
		<label>Challenge Mission</label>
		<textarea name="mission" type="text" class="form-control" placeholder="Enter Mission"></textarea>
	</div>
	<div class="form-group">
		<label>Challenge Hint</label>
		<input name="hint" type="text" class="form-control" placeholder="Enter Hint">
	</div>
	<div class="form-group">
		<label>MD5 flag</label>
		<input name="flag" type="text" class="form-control" placeholder="Enter flag" >
	</div>

	<div class="form-group">
		<label>Category</label>
		<select name="category" class="form-control">
			<?php while($row = $categories->fetch_assoc()) : ?>
			<?php if($row['id'] == $post['category']) {
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
		<input name="score" type="text" class="form-control" placeholder="Enter Score">
	</div>
	
	<div>
	<input name="submit" type="submit" class="btn btn-default" value="Submit" />
	<a href="index.php" class="btn btn-default">Cancel</a>
	</div>
	<br>
</form>

<?php include 'includes/footer.php'; ?>
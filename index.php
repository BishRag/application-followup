<?php
class Interview
{
	public static $title = 'Interview test'; // $title must be a static property in order to be accessed using ::
}
$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';
$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);
$person = $_POST['person'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1> <!-- $title changed to static property so :: works as intended -->

	<?php
	// Print 10 times
	for ($i=0; $i<10; $i++) { // Set starting value of i to 0 and set range as i < 10 to allow for correct number of loops
		echo '<p>' . $lipsum . '</p>'; // Switched '+' to '.' for correct concatination 
	}
	?>


	<hr>


	<form method="post" action="<?=$_SERVER['REQUEST_URI'];?>"> <!-- Form method changed to post to correctly display entered data on submit -->
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p>
	<?php endif; ?>


	<hr>


	<table border='1'> <!-- Added border value for table row/column clarity -->
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person): ?>
				<tr>
					<td><?=$person['first_name'];?></td> <!-- fixed php to correct obtain value from array -->
					<td><?=$person['last_name'];?></td> <!-- fixed php to correct obtain value from array -->
					<td><?=$person['email'];?></td> <!-- fixed php to correct obtain value from array -->
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>
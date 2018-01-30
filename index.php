<?php
class Interview
{   
    // -----------------------------------------------------------------------------------
    // Comment 1 :
    // Declaring property title as static so that it can be accessed as Interview::$title
    // -----------------------------------------------------------------------------------
	static $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);


// -------------------------------------------------------------------------------------------------------------------------------------
// Comment 2 :
// Added a isset() condition to check if $_POST contains person index, to avoid undefined index error
// Also initializing $person to null, in case the if loop is not executed, it will throw an error 'undefined variable' on line 80 & 81
// -------------------------------------------------------------------------------------------------------------------------------------
$person = null;
if(isset($_POST['person'])) {
    $person = $_POST['person'];
}

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
    <!--------------------------------------------------------------------------------------------------------------------------------------
    // Comment 3 :
    // title property of Interview class was being called statically. To do so, property needs to be defined as static. As done in comment 1
    ---------------------------------------------------------------------------------------------------------------------------------------->
    <h1><?=Interview::$title;?></h1>
    
	<?php
	// Print 10 times
    // ---------------------------------------------------------------------------------------------------------------------
    // Comment 4 :
    // If we initialize i at 10, our condition will never be true and for loop will not be executed
    // Changed the initialization of i to 0 and and changed condition of for loop to i less than 10 to print string 10 times
    // ---------------------------------------------------------------------------------------------------------------------
	for ($i=0; $i<10; $i++) {
        // --------------------------------------------------------
        // comment 5 :
        // used '.' (concatenation operator in PHP ) instead of '+'
        // --------------------------------------------------------
		echo '<p>'.$lipsum.'</p>';
	}
	?>
	<hr>
    <!-----------------------------------------------------------------------------------------------
    Comment 6 :
    Changed method of form to POST from GET
    We can use get as well, but in that case, we have to change $_POST to $_GET on line no 28 & 29
    ------------------------------------------------------------------------------------------------>
	<form method="POST" action="<?=$_SERVER['REQUEST_URI'];?>">
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>
	<?php if ($person): ?>
		<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p>
	<?php endif; ?>
	<hr>
	<table>
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
                    <!-----------------------------------------------------------------------------------------------
                    Comment 7 :
                    Since $person is an array and not an object, we have to access its indexes and not the properties
                    Hence changed $person->first_name to $person['first_name'] and likewise in below lines
                    ------------------------------------------------------------------------------------------------>
					<td><?=$person['first_name'];?></td>
					<td><?=$person['last_name'];?></td>
					<td><?=$person['email'];?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>
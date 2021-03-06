<!-- main page access and logout -->
<?php 
  session_start(); 
  $username = $_SESSION['username'];

  //if the user tries to go directly to index.php without loggin in
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  //if the user clicks the Logout link
  if (isset($_GET['logout'])) {
  	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['id']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Keep Calm and List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="scss/base/normalize.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>
<body>
    <header>
		<div class="pageWrap">
			<nav>
				<span>LOGO</span>
				<ul>
					<li><a href="">Contact Us</a></li>
					<li><a href="index.php?logout">Logout</a></li>
				</ul>
			</nav>
		</div>
    </header>
    <main>
		<div class="pageWrap flex-center">
		<!-- notification message -->
			<?php if (isset($_SESSION['username'])) : ?>
				<h2 class="welcome">
				<?php 
					echo "Welcome {$_SESSION['first_name']}!";
				?>
				</h2>
			<?php endif ?>
			<div class="flex-center">
			<!-- tabel of tasks -->
				<table class="tasks">
					<caption>Your Tasks</caption>
					<tr>
						<th>Name</th>
						<th>Days Left</th> 
						<th>Priority</th>
						<th>Day Entered</th>
					</tr>
					<?php include 'server-main.php'; ?>
				</table>
			<!-- form to enter in new tasks -->
				<form class="new-tasks" action="index.php" method="POST">
					<fieldset>
					<h4>Enter a New Task</h4>
					<div>
						<label for="task_name">Task Name:</label>
						<input type="text" id="task_name" name="task_name">
					</div>
					<div>
						<label for="due_date">Due Date:</label>
						<input type="text" id="due_date" name="due_date">
					</div>
					<div>
						<label for="priority">Priority(5 = high priority):</label>
						<select id="priority" name="priority">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					<button type="submit" name="add_task">Add Task</button>
					</fieldset>
				</form>
			</div><!-- /flex-center -->
		</div><!-- /pageWrap flex-center -->
    </main>
    <footer>
        <div class="pageWrap">
        <span>&copy;2018</span>
        </div>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login/Register page</title>
</head>
<body>
	<h1>Welcome!</h1>
	<div class="register">
		<form action="/users/new_user" method="post">
			<p>
				Name:
				<input type="text" name="name">
			</p>
			<p>
				Alias:
				<input type="text" name="alias">
			</p>
			<p>
				Email:
				<input type="text" name="email">
			</p>
			<p>
				Password:
				<input type="password" name="password">
			</p>
			<p>
				Confirm Password:
				<input type="password" name="pass_confirm">
			</p>
			<p>
				Date of Birth:
				<input type="number" name="month" min="1" max="12" placeholder="month">
				<input type="number" name="day" min="1" max="31" placeholder="day">
				<input type="number" name="year" min="1800" max="2015" placeholder="year">
			</p>
			<input type="submit" value="Register">
		</form>
	</div>
	<div class="login">
		<form action="/users/login_user" method="post">
			<p>
				Email:
				<input type="text" name="email">
			</p>
			<p>
				Password:
				<input type="password" name="password">
			</p>
			<input type="submit" value="Login">
		</form>
	</div>
	<div class="errors">
		<?= $this->session->flashdata('errors'); ?>
		<?= $this->session->flashdata('success'); ?>
	</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quotes Home</title>
	<style>
		.favs, .allquotes{
			display: inline-block;
			margin: 20px;
		}
		a{
			display: block;
		}
	</style>
</head>
<body>
	<h1>Welcome <?= $user['alias'] ?></h1>
	<a href="/users/destroy">Logout</a>
<div class="allquotes">
	<h1>Quotes</h1>
<?php foreach ($quotes as $quote) 
{?>
	<div class="quote">
		<h4><?=$quote['author'] ?></h4>
		<p><?=$quote['content']	?></p>
		<p>Posted by <?= $quote['alias'] ?></p>
		<form action="/favorites/add_favorite" method="post">
			<input type="hidden" name="quote_id" value="<?=$quote['id'] ?>">
			<input type="hidden" name="user_id" value="<?= $this->session->userdata('id'); ?>">
			<input type="submit" value="Add to my Favorites">
		</form>
	</div>
<?php } ?>
</div>
<div class="favs">
	<h1>Favorites!</h1>
	<?php foreach ($favorites as $fav) 
	{ ?>
		<div class="fav">
		<h4><?=$fav['author'] ?></h4>
		<p><?=$fav['content']	?></p>
		<p>Posted by <?= $fav['poster'] ?></p>
		<form action="/favorites/remove_favorite" method="post">
			<input type="hidden" name="fav_id" value="<?=$fav['id'] ?>">
			<input type="submit" value="Remove from my Favorites">
		</form>
	</div>
		
<?php } ?>
</div>


	<div class="add">
		<h3>Contribute a Quote:</h3>
		<form action="/quotes/new_quote" method="post">
			<p>
				Quoted by:
				<input type="text" name="author">
			</p>
			<p>
				Message:
				<textarea name="content" cols="30" rows="10"></textarea>
			</p>
			<input type="hidden" name="id" value="<?=$this->session->userdata('id')?>">
			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>

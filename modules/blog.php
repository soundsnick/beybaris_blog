<?php 
	require_once('connect.php');
	$query = $mysqli->query("SELECT * FROM blog ORDER BY id DESC");
	while($result = $query->fetch_assoc()){
		echo 
		'<div class="blog--item" data-id="'.$result['id'].'">
			<h3 class="blog--item__title">'.$result['title'].'</h3>
			<p class="blog--item__description">'.$result['description'].'</p>
			<p class="blog--item__content"></p>
		</div>';
	}
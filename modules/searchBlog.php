<?php 
	if(isset($_POST['postId'])){
		require_once('connect.php');
		global $mysqli;
		$searchQuery = $_POST['postId'];
		$query = $mysqli->query("SELECT * FROM blog WHERE id='$searchQuery'");
		$response = $query->fetch_assoc();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}
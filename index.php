<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Главная - Абик Бейбарыс</title>
	<?php require_once('components/head.php');?>
</head>
<body>
	<div class="container">
		<div class="app">
			<div class="flex">
				<div class="col-2">
					<?php require_once('components/sidebar.php');?>
				</div>
				<div class="col-auto">
					<div class="app__main">
						<?php require_once('modules/blog.php');?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once('components/footer.php') ?>
	<script>
		$(document).ready(function(){
			$('.sl--home').addClass('active');
		});
		var postId;
		$('.blog--item').click(function(){
			if(postId == $(this).data('id')){
				$('.blog--item').removeClass('active');
				$('.blog--item__content').slideUp();
			}
			else{
				postId = $(this).data('id');
				$.ajax({
				  type: "POST",
				  url: "modules/searchBlog.php",
				  data: {postId: postId},
				  success: function(msg){
				  	let response = JSON.parse(msg);
				  	$('.blog--item').removeClass('active');
				  	$('.blog--item[data-id="'+postId+'"] .blog--item__content').html(response['content']);
				  	$('.blog--item__content').slideUp();
				  	$('.blog--item[data-id="'+postId+'"] .blog--item__content').slideToggle();
				  	$('.blog--item[data-id="'+postId+'"]').addClass('active');
				  }
				});
			}
		});	
	</script>
</body>
</html>
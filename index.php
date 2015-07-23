<!DOCTYPE html>
<html>
	<head>
		<link href="css/my.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16<link rel="manifest" href="/manifest.json">
		<link href="css/footer.css" rel="stylesheet">

		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		
		<title>Yummy!</title>
	</head>
	<body>
	
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/yummy">Yummy!</a>
				</div>
				<div>
				
					
					<?php
					if(!empty($_GET['request']) || !empty($_POST['request']))
						include('src/top_search.php');
					?>
					
				</div>
			</div>
		</nav>
  
				<?php 
					if(!empty($_GET['request']) || !empty($_POST['request']))
						include('src/index_parse.php');
					else
						include('src/search.php');
				?>
<footer class="footer">
      <div class="container">
        <p class="text-muted">"Дом у дороги" ® 2015-2016</p>
      </div>
</footer>

	</body>
</html>
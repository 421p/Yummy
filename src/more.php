<?php

require 'shd.php';

echo '<meta charset = "utf-8"><center>';
$blank_image = "http://www.koolinar.ru/img/blankrecipe_index.jpg";
$url = $_GET['id'];

$q = "http://www.koolinar.ru/recipe/view/$url";

$options = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "User-Agent: Android / Firefox 29: Mozilla/5.0 (Android; Mobile; rv:29.0) Gecko/29.0 Firefox/29.0"
  )
);

$context = stream_context_create($options);

$file = file_get_contents($q, false, $context);

$html = str_get_html($file);

$img_s = 'http://www.koolinar.ru/' . $html->find('img[class=pure-img-responsive]',0)->src;
if($html->find('img[class=pure-img-responsive]',0)->src == NULL) $img_s = $blank_image;
?>

<?php 
/*echo '<img src ="' . $img_s . '"/><br>' .
'<h3 class = "ingredients">Ингредиенты</h3>';
*/
$ingredients =  '<ul class = "ingredients">';

foreach($html->find('li[itemprop=ingredients]') as $spisok)
{
    $ingredients .= "<li>$spisok->innertext</li>";
}

/*echo $ingredients . '</ul>' . 
'<h3 class = "howto">Способ приготовления: </h3><p class = "recipe">' .
$html->find('p[itemprop=recipeInstructions]', 0)->plaintext;

echo "</p></center>";*/

?>

<!--<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../my.css" rel="stylesheet">
		<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16<link rel="manifest" href="../manifest.json">
		<link href="../css/footer.css" rel="stylesheet">

		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="../img/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Yummy!Recipe</title>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/yummy/">Yummy!</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Page 1</a></li>
					<li><a href="#">Page 2</a></li>
					<li><a href="#">Page 3</a></li>
				</ul>
			</div>
			</div>
		</nav>
		
		<div class="jumbotron">
		    <?php echo '<img id="list_pic1" src="' . $img_s . '" alt="...">'; ?>
			<h3>Ингредиенты</h3>
			
			<?php echo $ingredients . '</ul>';?>

		</div>
		<div class="container">
			<div class="row">	
				<div class="col-md-12"> 
					<img id="p_pic" src="../img/rez_pic.png" alt="...">
					<h3>Способ приготовления</h3>
					<hr>
					<p id="rezept">
					<?php echo $html->find('p[itemprop=recipeInstructions]', 0)->plaintext; ?>
					</p>
				</div>
			</div>
		</div>
		
		<footer class="footer">
      <div class="container">
        <p class="text-muted">Segmentation Fault LTD. ® 2015-2016</p>
      </div>
</footer>
		
	</body>
</html>-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/my.css" rel="stylesheet">
		<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16<link rel="manifest" href="../manifest.json">
		<link href="../css/footer.css" rel="stylesheet">

		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="../img/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Yummy!Recipe</title>
	</head>
	<body>
			<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/yummy/">Yummy!</a>
			</div>
			</div>
		</nav>
		
		<div class="jumbotron">
			<div class="container">
				<div class="row">	
					<div class="col-md-3"> 
						<?php echo '<img id="list_pic1" src="' . $img_s . '" alt="...">'; ?>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-8"> 
						<h3>Ингредиенты</h3>
						<p id="rezept">
						<?php echo $ingredients . '</ul>';?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">	
				<div class="col-md-12"> 
					<img id="p_pic" src="../img/rez_pic.png" alt="...">
					<h3>Способ приготовления</h3>
					<hr>
					<p id="rezept">
					<?php echo $html->find('p[itemprop=recipeInstructions]', 0)->plaintext; ?>
					</p>
				</div>
			</div>
		</div>
		
<footer class="footer">
      <div class="container">
        <p class="text-muted">"Дом у дороги" ® 2015-2016</p>
      </div>
</footer>
		
	</body>
</html>
		
		


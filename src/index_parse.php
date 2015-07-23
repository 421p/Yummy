<div class="container" style="padding-top:55px;">
			<div class="row">	
			
<?php

require 'shd.php';

$blank_image = "http://www.koolinar.ru/img/blankrecipe_index.jpg";

//$request = $_GET['request'];

if(empty($_POST['request'])) {$request = $_GET['request'];} else {$request = $_POST['request'];}

$page_number = $_GET['page'];
if(!isset($_GET['page'])) $page_number = 1;
$request = rawurlencode($request);

$q = "http://www.koolinar.ru/list?page=$page_number&search=$request&utf8=%E2%9C%93";

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

$i = 2; // for text

    foreach($html->find('a[class=link_orange]') as $element) 
    { 
            $temp = ltrim($element->href, '/recipe/view/');
            $moar = 'recipe/?id=' . $temp;
            
            $img_s = 'http://www.koolinar.ru' . $html->find("img[alt*=$temp]",0)->src; //если нет пикчи, то пихаем дефолтную
            
            if($html->find("img[alt*=$temp]",0) == NULL) $img_s = $blank_image;
            
            echo '<div class = "col-md-10"><p><a href="' . $moar . '"><img id = "list_pic" src="' . $img_s . '"/></a>' . // image
            '<h3> <a href="' . $moar . '">' . $element->innertext . '</a></h3>' . //header
            $html->find('p', $i)->plaintext . //main text
            '</p><a type="button" class="btn btn-primary" href="' . $moar . '">Читать далее...</a><br>' . //more
            '</div>';
        $i++;
    }
    
    
    $page_number++;
    echo '<div class="col-md-11"><a href = "?request=' . $request . '&page=' . $page_number . '" type="button" class="btn btn-default"><b>ЕЩЁ РЕЦЕПТЫ...</b></a></div>';

?>

	<div class="clearfix visible-lg"></div>
			</div>
		</div>
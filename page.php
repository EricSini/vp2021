<?php
    $author_name = "Eric Sinisalu";
	$weekday_names_et = ["Esmaspäev", "Teisipäev", "Kolmapäev", "Neljapäev", "Reede", "Laupäev", "Pühapäev"]; 
	$full_time_now = date("d.m.Y H:i:s");
	$hour_now = date("H");
	//echo $hour_now; 
	$weekday_now = date("N");
	//echo $weekday_now;
	$day_category = "ebamäärane";
	if($weekday_now <= 5){
		$day_category = "Koolipäev";
	}else {
		$day_category = "Puhkepäev";
	}	
	//if($muutuja > 8 and $muutuja <= 18)

	//echo $day_category;
	//kuupäev kellaaeg, on koolipäev
	
	//loome fotode kataloogides sisu
	$photo_dir = "Photos/";
	$allowed_photo_types = ["image/jpeg", "image/png"];
	$all_files = array_slice(scandir($photo_dir), 2);
	$photo_files = [];
	foreach($all_files as $file){
		$file_info = getimagesize($photo_dir .$file);
		if(isset($file_info["mime"])){
		    if(in_array($file_info["mime"], $allowed_photo_types)){
				array_push($photo_files, $file);
			}	
		}
	}
	//var_dump($photo_files);
	//$all_files = scandir ($photo_dir);
    //echo $all_files;
    //var_dump($all_files);
    //$only_files	= array_slice($all_files, 2);
	//var_dump($only_files);
	$limit = count($photo_files);
	//echo $limit;
	$pic_num = mt_rand(0,$limit - 1);
	$pic_file = $all_files[$pic_num];
	//<img src="pilt.jpg" 
	$pic_html = '<img src ="' .$photo_dir .$pic_file .'"alt = "Tallinna ülikool">';
	?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
	<title><?php echo $author_name; ?>, veebiprogrammeerimine</title>
</head>
<body style="background-color:grey;">
    <center><h1><?php echo $author_name; ?> veebiprogrammeerimine</h1>
	<p>See leht on valminud õppetöö raames ning ei sisalda mingisugust tõsiseltvõetavad sisu!</p>
	<p>Õppetöö toimus <a href="https://www.tlu.ee/dt">Tallinna Ülikooli Digitehnoloogiate instituudis</a>.</p>
	<img src="3700x1100pildivalik187.jpg" alt="Tallinna Ülikooli Terra õppehoone" width="600">
	<p>Lehe avamise hetk: <span><?php echo $weekday_names_et [$weekday_now - 1] .", " .$full_time_now .", on " . $day_category; ?><span>.<p>
	<h2>Kursusel õpime</h2>
	<ul>
	    <li>HTML keelt</li>
		<li>PHP programmeerimiskeelt</li>
		<li>SQL päringukeelt</li>
		<li>JNE</li>
    </ul>
	<?php echo $pic_html; ?>
	</center>
</body>
</html>
<?php
    $author_name = "Eric Sinisalu";
	$todays_evaluation = null;
	$inserted_adjective = null;
	$adjective_error = null;
	//tänane päev on... asi
	if(isset($_POST["todays_adjective_input"])){
		if(!empty($_POST["adjective_input"])){
			$todays_evaluation =  "<p>Tänane päev on <strong>".$_POST["adjective_input"] .
			"</strong>.</p>";
			$inserted_adjective = $_POST["adjective_input"];
		} else {
			$adjective_error = "Palun kirjuta tänase päeva kohta omadussõna!" ;
		}
			
	}		
	
	//suvaline pilt
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
	$limit = count($photo_files);
	$pic_num = mt_rand(0,$limit - 1);
	$pic_file = $all_files[$pic_num];
	$pic_html = '<img src ="' .$photo_dir .$pic_file .'"alt = "Tallinna ülikool">';
	
	//fotode nimekiri
	$list_html = "<ul>";
	for($i=0; $i<$limit; $i ++){
		$list_html .= "<li>".$photo_files[$i] ."</li>";
	}
	$list_html .= "</ul>";
	$photo_select_html = '<select name="photo_select>"'. "\n";
	for($i=0; $i<$limit; $i ++){
		//<option value="0">fail.jpg</option>
	$photo_select_html .= '<option value="' .$i .'">' .$photo_files[$i] ."</option> \n";
	}
	$photo_select_html .= "</select>";
?> 
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
	<title><?php echo $author_name; ?>, veebiprogrammeerimine</title>
</head>
<body style="background-color:grey;">
    <h1><?php echo $author_name; ?> veebiprogrammeerimine</h1>
	<p>See leht on valminud õppetöö raames ning ei sisalda mingisugust tõsiseltvõetavad sisu!</p>
	<p>Õppetöö toimus <a href="https://www.tlu.ee/dt">Tallinna Ülikooli Digitehnoloogiate instituudis</a>.</p>
	<img src="3700x1100pildivalik187.jpg" alt="Tallinna Ülikooli Terra õppehoone" width="600">
	<hr>
	<form method="post">
	   <input type="text" name="adjective_input" placeholder="Omadussõna tänase kohta"
	   value= "<?php echo $inserted_adjective; ?>">
	   <input type="submit" name="todays_adjective_input" value="Salvesta">
	   <span><?php echo $adjective_error; ?></span>
	</form>
	<hr>
	<?php
	    echo $todays_evaluation;
		
	?>
	<form method="POST">
	    <?php echo $photo_select_html; ?>
	</form>
	<?php
	    echo $pic_html;
		echo $list_html;
	?>
</body>
</html>
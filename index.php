<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <title>Instagram DP</title>
</head>
<body>
<div style="width:100%;text-align:center;">
<div class="container">
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="IG username" required/>
        <input class="button button-primary" value="Submit" type="submit"/> 
    </form>
<?php

if (isset($_POST['name']))
{
	$name = $_POST['name'];
	$json = file_get_contents("https://www.instagram.com/" . $name . "/?__a=1");
	$jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($json, TRUE)) , RecursiveIteratorIterator::SELF_FIRST);
	foreach($jsonIterator as $key => $val)
	{
		if ($key = "profile_pic_url")
		{
			$url[] = $val;
			$imageurl = $url[0]["profile_pic_url"];
			$followers = $url[0]["followed_by"]["count"];
			$fname = $url[0]["full_name"];
			break;
		}
	}

	$toreplace = ["/s150x150", "/vp"];
	$replaceby = ["/s1080x1080", ""];
	if (strpos($imageurl, '/s150x150') !== false)
	{
		$hdimage = str_replace($toreplace, $replaceby, $imageurl, $i);
	}
	else
	{
		$hdimage = $imageurl;
	}

	$followers = number_format($followers);
	echo '<a data-fancybox="gallery" href="' . $hdimage . '"><img src="' . $hdimage . '" alt="Something bad happened! Unable to load the image." width="70%" height="70%"></img></a>';
	echo "<br/>Full Name:<b> $fname</b>";
	echo "<br/>Followers:<b> $followers</b>";
}

?>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
</body>
</html>

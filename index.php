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
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <title>Instagram DP</title>
</head>
<body>
<div class="table-container">
<header>
    <div class="full-width-container">
        <div class="active" style="padding-top: 5px; padding-bottom: 5px;">
        <a class="nodec right" href="http://instadp.ml">
            <span class="center-text">INSTADP</span>
        </a>
        <a class="nodec left" href="#">
        <img class="center-text navimgsize" src="images/social_github.png"></img>
            <span class="center-text">Github</span>
        </a>
        <a class="nodec left" href="#">
        <img class="center-text navimgsize" src="images/social_facebook.png"></img>
            <span class="center-text">Facebook</span>
        </a>
        <a class="nodec left" href="#">
        <img class="center-text navimgsize" src="images/social_instagram.png"></img>
            <span class="center-text">Instagram</span>
        </a>
        <a class="nodec left" href="#">
        <img class="center-text navimgsize" src="images/social_youtube.png"></img>
            <span class="center-text">Youtube</span>
        </a>
        <div style="clear: both;"></div>
        </div>
        <div>
        <select> 
            <option value="http://instadp.ml" selected="selected">INSTADP</option> 
            <option value="#">Github</option> 
            <option value="#">Facebook</option> 
            <option value="#">Instagram</option> 
            <option value="#">Youtube</option> 
        </select>
        </div>
    </div>
</header>

<div style="width:100%;text-align:center;">
<div class="containermid">
    <form style="padding-top:10px;" action="index.php" method="post">
        <input type="text" name="name" placeholder="IG username" required/>
        <input style="background-color:#3498BD;color:#FFFFFF;" class="button" value="Submit" type="submit"/> 
    </form>
<?php
error_reporting(0);
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $json = file_get_contents("https://www.instagram.com/".$name."/?__a=1");
    if($json != null){
    $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($json, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);
    
    foreach ($jsonIterator as $key => $val) {
        if($key="profile_pic_url") {
            $url[]=$val;
            $imageurl = $url[0]["profile_pic_url"];
            $followers = $url[0]["followed_by"]["count"];
            $fname = $url[0]["full_name"];
            break;
        }
    }
$toreplace=["/s150x150","/vp"];
$replaceby=["/s1080x1080",""];
if (strpos($imageurl, '/s150x150') !== false) {
    $hdimage = str_replace($toreplace,$replaceby,$imageurl,$i);
} else {
    $hdimage = $imageurl;
}
$followers = number_format($followers);
echo '<a data-fancybox="gallery" href="'.$hdimage.'"><img src="'.$hdimage.'" alt="Something bad happened! Unable to load the image." width="60%" height="60%"></img></a>';
echo "<br/>Full Name:<b> $fname</b>";
echo "<br/>Followers:<b> $followers</b>";
}else{
    echo "Username does not exist.";
}}
?>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<!-- Page Footer Layout
           –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="table-block">
        <div class="container">
            <footer id="footer" class="twelve columns nodec">
                 Instadp Ⓒ 2018<br/>
                 Not affiliated with or endorsed by Instagram.
            </footer>
        </div>
    </div> <!-- end footer div.container -->
</div>
</body>
</html>
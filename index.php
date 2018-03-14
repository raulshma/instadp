<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Insta DP Download</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

    <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>

    <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="dist/images/favicon.png">

</head>

<body class="code-snippets-visible">

    <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="container" style="text-align:center;">
        <section style="text-align: center;">
            <h1 class="title">Instadp</h1>
        </section>
        <div class="navbar-spacer"></div>
        <nav class="navbar">
            <div class="container">
                <ul class="navbar-list">
                    <li class="navbar-item">
                        <a class="navbar-link" href="#" data-popover="#codeNavPopover">Social</a>
                        <div id="codeNavPopover" class="popover">
                            <ul class="popover-list">
                                <li class="popover-item">
                                    <a class="popover-link" href="#grid">Instagram</a>
                                </li>
                                <li class="popover-item">
                                    <a class="popover-link" href="#typography">Facebook</a>
                                </li>
                                <li class="popover-item">
                                    <a class="popover-link" href="#buttons">Deviantart</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="navbar-item">
                        <a class="navbar-link" href="#" data-popover="#moreNavPopover">Other</a>
                        <div id="moreNavPopover" class="popover">
                            <ul class="popover-list">
                                <li class="popover-item">
                                    <a class="popover-link" href="https://github.com/succkarz/instadp">Source</a>
                                </li>
                                <li class="popover-item">
                                    <a class="popover-link" href="https://github.com/succkarz/instadp/blob/master/README.md">About</a>
                                </li>
                                <li class="popover-item">
                                    <a class="popover-link" href="https://github.com/succkarz/instadp/blob/master/LICENSE">License</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="navbar-spacer"></div>
        <div style="padding-top:20px;">
        <p>Ever wanted to see someone's Instagram profile picture in full size but didn't know how? Instadp is a free to use service that allows you to see anyone's Instagram's profile picture in full size. Works on any account - even private profiles! Bookmark our webpage to see Instagram Profile Pictures on your phone as well.
        <form style="padding-top:10px;" action="index.php" method="post">
        <input type="text" name="name" placeholder="IG username" required/>
        <input class="button" value="Submit" type="submit"/> 
    </form>    
    </div>
        
<?php
error_reporting(0);
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $json = file_get_contents("https://www.instagram.com/".$name."/?__a=1");
    if($json != null){
    $instajson = json_decode($json, TRUE);
    $imageurl = $instajson['graphql']['user']['profile_pic_url'];
    $followers = $instajson['graphql']['user']["edge_followed_by"]["count"];
    $fname = $instajson['graphql']['user']["full_name"];
$toreplace=["/s150x150","/vp"];
$replaceby=["/s1080x1080",""];
if (strpos($imageurl, '/s150x150') !== false) {
    $hdimage = str_replace($toreplace,$replaceby,$imageurl,$i);
} else {
    $hdimage = $imageurl;
}
$followers = number_format($followers);
echo '<a data-fancybox="gallery" href="'.$hdimage.'"><img src="'.$hdimage.'" alt="Something bad happened! Unable to load the image." width="50%" height="50%"></img></a>';
echo "<br/>Full Name:<b> $fname</b>";
echo "<br/>Followers:<b> $followers</b>";
}else{
    echo "Username does not exist.";
}}
?>
    </div>
    <div id="footer">
        <div class="container">
    © Instadp 2018<br>
We are not affiliated with or endorsed by Instagram.
</div>
    </div>
</body>
</html>

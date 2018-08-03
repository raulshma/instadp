<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>Instagram DP Download - Instadp</title>
      <meta name="author" content="raul">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel='dns-prefetch' href='//fonts.googleapis.com' />
      <link rel='dns-prefetch' href='//cdnjs.cloudflare.com' />
      <link rel='dns-prefetch' href='//ajax.googleapis.com' />
      <meta name="description" content="See and download anyone Instagram Profile Picture for free in full size, no login no registration no survey, just enter the username and get the profile picture of the user in just one click for free.">
      <meta name="keywords" content="Instagram Profile Picture, InstaDP, instagram, display picture, display, picture, view, profile, picture,anyone Instagram, picture in full size,account even private,anyone instagram profile,instadp">
      <meta property="og:title" content="Instagram DP Download" />
      <meta property="og:type" content="article" />
      <meta property="og:url" content="http://instadp.ml/" />
      <meta property="og:image" content="http://instadp.ml/images/screen.png" />
      <meta property="og:description" content="See and download anyone Instagram Profile Picture for free in full size, no login no registration no survey, just enter the username and get the profile picture of the user in just one click for free."
      />
      <meta property="og:site_name" content="Instagram DP Download" />
      <meta name="robots" content="index, follow">
      <meta name="revisit-after" content="1 month">
      <meta name="theme-color" content="#3A3D3D" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/skeleton.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
      <link rel="icon" type="images/jpg" href="images/favicon.png">
</head>

<body class="color-change-2x">
      <div class="container" style="text-align:center;">
            <section style="text-align: center;">
                  <h1 style="margin-bottom:5px;" class="title">
                        <a class="notdec" href="index.php">Instadp</a>
                  </h1>
            </section>
            <div class="navbar-spacer">
            </div>
            <nav class="navbar">
                  <div class="container">
                        <ul class="navbar-list">
                              <li class="navbar-item">
                                    <a class="navbar-link" href="https://github.com/succkarz/instadp">Source
                                    </a>
                              </li>
                              <li class="navbar-item">
                                    <a class="navbar-link" href="https://github.com/succkarz/instadp/blob/master/README.md">About
                                    </a>
                              </li>
                              <li class="navbar-item">
                                    <a class="navbar-link" href="https://github.com/succkarz/instadp/blob/master/LICENSE">License
                                    </a>
                              </li>
                        </ul>
                  </div>
            </nav>
            <div class="navbar-spacer">
            </div>
            <div class="container1">
                  <form id="fPic" style="padding-top:20px;margin-bottom:0px;" method="post">
                        <input style="margin-bottom:3px;" id="name" type="text" name="uname" placeholder="IG username" required autofocus/>
                        <br/>
                        <input id="submit" class="button-primary" name="Submit" value="Submit" type="submit" />
                  </form>
                  <div class="sk-folding-cube loading">
                        <div class="sk-cube1 sk-cube"></div>
                        <div class="sk-cube2 sk-cube"></div>
                        <div class="sk-cube4 sk-cube"></div>
                        <div class="sk-cube3 sk-cube"></div>
                  </div>
                  <div class="container1" id="response"></div>
                  <p style="margin-bottom:0px;color: #323232;">
                        Ever wanted to see someone's Instagram profile picture in full size but didn't know how? Instadp is a free to use service
                        that allows you to see anyone's Instagram's profile picture in full size. Works on any account -
                        even private profiles! Bookmark our webpage to see Instagram Profile Pictures on your phone as well.
                  </p>
            </div>
            <button style="margin-top: 15px; font-size: 0.5em;" class="accordion">Changelogs</button>
            <div class="panel">
                  <code>
                        <strong>Feb 24 2018:</strong> Site launched.</code>
                  <br/>
                  <code>
                        <strong>April 28 2018:</strong> Fetch Code Update.</code>
                  <br/>
                  <code>
                        <strong>June 26 2018:</strong> Enter reload fix.</code>
                  </br>
                  <code>
                        <strong>June 27 2018:</strong> Visual Tweaks.</code>
            </div>
      </div>
      <div id="sitestat">
            <?php
                  function checkOnline($url){
                        $agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";$ch=curl_init();
                        curl_setopt ($ch, CURLOPT_URL,$url );
                        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
                        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt ($ch,CURLOPT_VERBOSE,false);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
                        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, FALSE);
                        $page=curl_exec($ch);
                        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);
                        if($httpcode>=200 && $httpcode<400) return true;
                        else return false;
                 }
                  if(checkOnline("https://codeofaninja.com")){
                        $status = '<div class="greendot"></div>';
                  }else
                  {
                        $status = '<div class="reddot"></div>';
                  } 
            ?>
            <span>server
            <?php 
            if(isset($status)){
                  echo $status;
            }?></span>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
      <script src="js/pace.js"></script>
      <script src="js/custom.js"></script>
</body>
</html>
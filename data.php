<?php
error_reporting(0);
if(isset($_REQUEST['uname'])){
$name = $_REQUEST['uname'];
$json = file_get_contents("https://www.instagram.com/".$name."/?__a=1");
if($json != null){
$instajson = json_decode($json, TRUE);
$imageurl = $instajson['graphql']['user']['profile_pic_url_hd'];
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
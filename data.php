<?php
error_reporting(0);
if(isset($_REQUEST['uname'])){
$name = $_REQUEST['uname'];
$json = file_get_contents("https://www.instagram.com/".$name."/?__a=1");
if($json != null){
$instajson = json_decode($json, TRUE);
$userid = $instajson['graphql']['user']['id'];
$jsonget = file_get_contents("https://i.instagram.com/api/v1/users/". $userid ."/info");
if($jsonget != null){
    $instajsonget = json_decode($jsonget,TRUE);
    $hdimage = $instajsonget['user']['hd_profile_pic_url_info']['url'];
    $followers = number_format($instajsonget['user']["follower_count"]);
    $fname = $instajsonget['user']["full_name"];
}
/*Commented code Does not work anymore*/
/* $imageurl = $instajson['graphql']['user']['profile_pic_url_hd']; */
/* $toreplace=["/s320x320","/vp"];
$replaceby=["/s1080x1080",""];
if (strpos($imageurl, '/s150x150') !== false) {
$hdimage = str_replace($toreplace,$replaceby,$imageurl,$i);
} else {
$hdimage = $imageurl;
} */
echo '<a data-fancybox="gallery" href="'.$hdimage.'"><img src="'.$hdimage.'" alt="Something bad happened! Unable to load the image." width="50%" height="50%"></img></a>';
echo "<br/>Full Name:<b> $fname</b>";
echo "<br/>Followers:<b> $followers</b><hr/>";
}else{
echo "Username does not exist or server busy <br/>.";
}}
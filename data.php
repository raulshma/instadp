<?php
error_reporting(0);
/* Logging function
function myfputcsv($handle, $array, $delimiter = ',', $enclosure = '"', $eol = "\n") {
    $return = fputcsv($handle, $array, $delimiter, $enclosure);
    if($return !== FALSE && "\n" != $eol && 0 === fseek($handle, -1, SEEK_CUR)) {
        fwrite($handle, $eol);
    }
    return $return;
}
*/
if(isset($_REQUEST['uname'])){
$name = $_REQUEST['uname'];
$doc = new DOMDocument();
//using codeofninja instagram id finder and fetching the id
$doc->loadHTML(file_get_contents("https://codeofaninja.com/tools/find-instagram-id-answer.php?instagram_username=".$name));
$xpath = new DOMXPath($doc);
$userid = $xpath->query('/html/body/div[1]/div[2]/div[1]/b')->item(0)->nodeValue;
//using the user id to get the json with the image url
$jsonget = file_get_contents("https://i.instagram.com/api/v1/users/". $userid ."/info");
}
if($jsonget != null){
    $instajsonget = json_decode($jsonget,TRUE);
    //storing the hd image url in hdimage var
    $hdimage = $instajsonget['user']['hd_profile_pic_url_info']['url'];
    $followers = number_format($instajsonget['user']["follower_count"]);
    $fname = $instajsonget['user']["full_name"];
    //displaying the image
    echo '<a data-fancybox="gallery" href="'.$hdimage.'"><img src="'.$hdimage.'" alt="Something bad happened! Unable to load the image." width="65%" height="65%"></img></a>';
    echo "<br/>Full Name:<b> $fname</b>";
    echo '<br/>Followers:<b> '.$followers.'</b>';
    echo '<br/><a style="text-decoration: none !important; color:#323232 !important;" href="'.$hdimage.'" download><small>Download</small></a><hr style="padding:0;margin:10px 0px;">';
}else{
echo "Username does not exist or server busy <br/>.";
}
/* Calling logging function and storing Username searched and data/time
if(isset($_POST['uname']))  {
$header=array($_REQUEST['uname']);
date_default_timezone_set('Asia/Kolkata');
$data=array($_REQUEST['uname'],date('l dS \of F Y h:i:s A'));
$fp = fopen('../users.csv', 'a+');
    //fputcsv($fp, $header);
    myfputcsv($fp, $data);
fclose($fp);
}
*/
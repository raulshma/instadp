<?php
error_reporting(0);
function myfputcsv($handle, $array, $delimiter = ',', $enclosure = '"', $eol = "\n") {
    $return = fputcsv($handle, $array, $delimiter, $enclosure);
    if($return !== FALSE && "\n" != $eol && 0 === fseek($handle, -1, SEEK_CUR)) {
        fwrite($handle, $eol);
    }
    return $return;
}
if(isset($_REQUEST['uname'])){
$name = $_REQUEST['uname'];
$json = file_get_contents("https://www.instagram.com/".$name."/?__a=1");
if($json != null){
$instajson = json_decode($json, TRUE);
$userid = $instajson['graphql']['user']['id'];
}else{
$doc = new DOMDocument();
$doc->loadHTML(file_get_contents("https://codeofaninja.com/tools/find-instagram-id-answer.php?instagram_username=".$name));
$xpath = new DOMXPath($doc);
$userid = $xpath->query('/html/body/div[1]/div[2]/div[1]/b')->item(0)->nodeValue;
$jsonget = file_get_contents("https://i.instagram.com/api/v1/users/". $userid ."/info");
}
if($jsonget != null){
    $instajsonget = json_decode($jsonget,TRUE);
    $hdimage = $instajsonget['user']['hd_profile_pic_url_info']['url'];
    $followers = number_format($instajsonget['user']["follower_count"]);
    $fname = $instajsonget['user']["full_name"];
    echo '<a data-fancybox="gallery" href="'.$hdimage.'"><img src="'.$hdimage.'" alt="Something bad happened! Unable to load the image." width="65%" height="65%"></img></a>';
    echo "<br/>Full Name:<b> $fname</b>";
    echo "<br/>Followers:<b> $followers</b><hr/>";
}else{
echo "Username does not exist or server busy <br/>.";
}
if(isset($_POST['uname']))  {  
$header=array($_REQUEST['uname']);
$data=array($_REQUEST['uname']);
$fp = fopen('../users.csv', 'a+');
    //fputcsv($fp, $header);
    myfputcsv($fp, $data);
fclose($fp);
}
}
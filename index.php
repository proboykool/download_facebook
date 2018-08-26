<!DOCTYPE html>
<html>
<style>
        html, body {
            height: 100%;
            margin-top: 15px;
            padding: 0;
            width: 100%;
        }

        body {
            display: table;
        }
        .my-block {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
		div.round2 {
    border: 2px solid grey;
    border-radius: 8px;
}
input[type=text], select {
	font-size: 20px;
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
	font-size: 20px;
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
div.imgdown {
    width: 100%;
    height: 100%;	
}
div.imgdown img {
    max-width: 40%;
    height: auto;
}
</style>
<link rel="shortcut icon" type="image/x-icon" href="">
<title>Facebook Video</title>
<body>
<div class="my-block">
<center><a href="logo.png" ><img frameborder="0" src="" style="height:500px;"/></a></center><br>
<form method="post" action="">
<center><input name="url" type="text"></center>
<input type="submit"></font>
<?php
class cURL {
var $headers;
var $user_agent;
var $compression;
var $cookie_file;
var $proxy;
	function __construct($cookies=TRUE,$cookie='cookie.txt',$compression='gzip',$proxy='') {
		$this->headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
		$this->headers[] = 'Connection: Keep-Alive';
		$this->headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
		$this->user_agent = 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36';
		$this->compression=$compression;
		$this->proxy=$proxy;
		$this->cookies=$cookies;
		if ($this->cookies == TRUE) $this->cookie($cookie);
	}
	function cookie($cookie_file) {
		if (file_exists($cookie_file)) {
		$this->cookie_file=$cookie_file;
		} else {
		fopen($cookie_file,'w') or $this->error('The cookie file could not be opened. Make sure this directory has the correct permissions');
		$this->cookie_file=$cookie_file;
		fclose($this->cookie_file);
		}
	}
	
	function getheader($url) {
		$process = curl_init($url);
		curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($process, CURLOPT_HEADER, 1);
		curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
		if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
		if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
		curl_setopt($process,CURLOPT_ENCODING , $this->compression);
		curl_setopt($process, CURLOPT_TIMEOUT, 30);
		curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($process,CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($process,CURLOPT_CAINFO, NULL);
		curl_setopt($process,CURLOPT_CAPATH, NULL);
		$return = curl_exec($process);
		curl_close($process);
		return $return;
	}
	
	function get($url) {
		$process = curl_init($url);	
		curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($process, CURLOPT_HEADER, 0);
		curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
		if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
		if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
		curl_setopt($process,CURLOPT_ENCODING , $this->compression);
		curl_setopt($process, CURLOPT_TIMEOUT, 30);
		curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($process,CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($process,CURLOPT_CAINFO, NULL); 
		curl_setopt($process,CURLOPT_CAPATH, NULL);
		$return = curl_exec($process);
		curl_close($process);
		return $return;
	}
	function post($url,$data) {
		$process = curl_init($url);
		curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($process, CURLOPT_HEADER, 1);
		curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
		if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
		if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
		curl_setopt($process, CURLOPT_ENCODING , $this->compression);
		curl_setopt($process, CURLOPT_TIMEOUT, 30);
		curl_setopt($process, CURLOPT_POSTFIELDS, $data);
		curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($process, CURLOPT_POST, 1);
		curl_setopt($process,CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($process,CURLOPT_CAINFO, NULL); 
		curl_setopt($process,CURLOPT_CAPATH, NULL); 
		$return = curl_exec($process);
		curl_close($process);
		return $return;
	}
}
$curl = new cURL();
if(isset($_POST['url'])){
$link = str_replace('m.facebook.com','www.facebook.com',$_POST['url']);
}
if(isset($_POST['url'])){
$dl = $curl->get($link);
$dl1 = explode("hd_src", $dl);
if(isset($dl1[2])){
$dl2 = explode("sd_src", $dl1[2]);
$dl3 = explode("hd_tag", $dl2[1]);
$hddl = str_replace($dl2[1], '', $dl1[2]);
$hd = str_replace(array( '",', ':"', 'sd_src'), array( '', '', ''), $hddl);
$hdp = '{"label":"HD","type":"mp4","file":"'.$hd.'"},';
$sddl = str_replace($dl3[1], '', $dl2[1]);
$sd = str_replace(array( '",', ':"', 'hd_tag'), array( '', '', ''), $sddl);
$sdp = '{"label":"SD","type":"mp4","file":"'.$sd.'"}';
$outs = 'sources: ['.$hdp.$sdp.'],';
}else{
$dl2 = explode("sd_src", $dl);
$dl3 = explode("hd_tag", $dl2[2]);
$sddl = str_replace($dl3[1], '', $dl2[2]);
$sd = str_replace(array( '",', ':"', 'hd_tag'), array( '', '', ''), $sddl);
$sdp = '{"label":"SD","type":"mp4","file":"'.$sd.'"}';
$outs = 'sources: ['.$sdp.'],';
}
$dlimg = explode("hidden_elem", $dl);
$dlimg1 = explode("(", $dlimg[1]);
$dlimg2 = explode(")", $dlimg1[1]);
$dlimg3 = str_replace(array('&#039;', '\\\3a ', '\\\3d ', '\\\26 '), array('', ':', '=', '&'), $dlimg2[0]);
if(isset($dl1[2])){
	echo '<center>Image download: </center><a href="'.$dlimg3.'" download><img frameborder="0" src="/Instagram/insta/downloadbt.png" style="width:120px;height:40px;"/></a><br>';
	echo '<center>Video download: </center>';
	echo '<center>SD: </center><a href="'.$sd.'" download><img frameborder="0" src="/Instagram/insta/downloadbt.png" style="width:120px;height:40px;"/></a>';
	echo '<br>';
	echo '<center>HD: </center><a href="'.$hd.'" download><img frameborder="0" src="/Instagram/insta/downloadbt.png" style="width:120px;height:40px;"/></a>';
}else{
	echo '<center>Image download: </center><a href="'.$dlimg3.'" download><img frameborder="0" src="/Instagram/insta/downloadbt.png" style="width:120px;height:40px;"/></a><br>';
	echo '<center>Video download: </center>';
	echo '<center>SD: </center><a href="'.$sd.'" download><img frameborder="0" src="/Instagram/insta/downloadbt.png" style="width:120px;height:40px;"/></a>';	
}
echo '<br>';
echo '<br>';
echo '<center><font size="4">Your Picture, Video:</font></center>';
echo '<br>';
echo '<div class="imgdown"><img frameborder="0" src="'.$dlimg3.'"/>	';
echo '<video width="30%" height="30%" controls>
  <source src="'.$sd.'" type="video/mp4">
</video>';
echo '</div>';
}
?>
</form>
<footer>
	<span><a href='http://tmqtest.rf.gd/insta' style='color:#000;'></a></span>
 </footer>
</div>
</body>
</html>

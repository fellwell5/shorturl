<?php
error_reporting(0);
include "mail.php";

$code = $_GET["code"];
$art = $_GET["art"];

$datei = $code.".php";
if(include $datei){
    #xxx
     }else{
         echo "<a href='index.php'>BACK</a><br>";
    exit("Error 404: Not found!");
     }
     
$timestamp = filemtime($datei);

if($art == "json"){
    ?>
    <html><title><?php echo '{"code": "'.$code.'", "url": "'.$url.'", "ip": "'.$ip.'", "createts": "'.$timestamp.'"}'; ?></title><body>
    <?php echo '{"code": "'.$code.'", "url": "'.$url.'", "ip": "'.$ip.'", "createts": "'.$timestamp.'"}'; ?>
    </body></html>
<?php
}else{
    ?>
<html>
<head>
<title>ShortURL</title>
<link href="bootstrap.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href='info.css' rel='stylesheet'>
</head>
<body onLoad="if (location.hash != '#info') location.hash = '#info';"> 
<div class="nav">
<ul class="pull-left">
<li><a href="index.php">HOME</a></li>
<li><?php echo '<a href="mailto:'.$mail.'" target="_blank">'; ?>Contact ShortURL</a></li>
</ul>

<ul class="pull-right">
<li><a href="https://twitter.com/fellwell5" class="twitter-follow-button" data-show-count="false" data-lang="en" data-size="large">Follow @fellwell5</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</li>
</ul>
</div>
    <div class="info">
<table height="100%" width="100%">
<tr>
<td align="center" valign="middle">
<div class="container">
<!-- Dieser Text läuft mittig -->
<a name="info"></a>
<h2>INFO</h2>
<p>Get Information about <span><?php echo $code; ?></span></p>
<div class="meta">
<table border="1">
<tr>
<td>URL:</td>
<td><a href='<?php echo $url; ?>'><?php echo $url; ?></a></td>
</tr>
<tr>
<td>IP:</td>
<td><a href='http://www.utrace.de/?query=<?php echo $ip; ?>'><?php echo $ip; ?></a></td>
</tr>
<tr>
<td>TIMESTAMP:</td>
<td><?php echo $timestamp; ?></td>
</tr>
<tr>
<td>DATE - TIME:</td>
<td><?php echo date('G:i:s l, d.M.Y', $timestamp); ?></td>
</tr>
</table>
</div>
</div>
</td>
</tr>
</table>
</div>
</body></html>
<?php
}
?>
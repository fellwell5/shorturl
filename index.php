<?php
error_reporting(0);
include "mail.php";
if($mail == ""){
    exit("Enter the Admin Mail into mail.php!");
    }
?>
<html>
<head>
<title>ShortURL</title>
<link href="bootstrap.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href='main.css' rel='stylesheet'>
</head>
<body>
<div class="create">
<table height="100%" width="100%">
<tr>
<td align="center" valign="middle">
<div class="container">
<!-- Dieser Text läuft mittig -->
<a name="create"></a>
<h2>ShortUR</h2>
<p>Create a ShortURL for <span>free</span>!</p>
<form method="POST">
<input class="itext" type="text" name="url" value="URL" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'URL';}"/>
<input type="submit" class="ibutton" value="Create ShortURL" />
</form>
<?php
@$url = $_POST["url"];



####CODE
$abc123 = array("q","w","e","r","t","z","u","i","o","p","a","s","d","f","g","h","j","k","l","y","x","c","v","b","n","m",1,2,3,4,5,6,7,8,9,0);
$code = "";
$count = count($abc123);
###WIEVIELE STRINGS?
$strings = 7;
###
$code = "0";
for ($i = 1; $i <= $strings; $i++) {
    $rand = rand(0, $count);
    $code .= $abc123[$rand];
}
####END CODE

$ip = $_SERVER["REMOTE_ADDR"];

$explode = explode("/", $_SERVER['REQUEST_URI']);
$count = count($explode);
$urlzs = "http://";
$urlzs .= $_SERVER['HTTP_HOST'];
for($i = 1; $i < $count-1; $i++)
{
     $urlzs .= "/";
    $urlzs .= $explode[$i];
}
$urlzs .= "/w.php?c=".$code;
$shorturl = $urlzs;
$dname = $code.".php";

$text = "ShortURL: ".$shorturl;

if(!$url == ""){
    
$urla = "$"."url";
$ipa = "$"."ip";
$phrase = "<?php $urla = 'qwe'; $ipa = 'rtz'; ?>";
$alt = array("qwe", "rtz");
$neu = array("$url", "$ip");
$inhalt = str_replace($alt, $neu, $phrase);
$datei = fopen($dname, "w");
fwrite($datei, $inhalt);
fclose($datei);


echo "<br>";
echo "<p>ShortURL:</p>";
echo "<br>";
echo "<form>";
echo "<label>CODE:</label>";
echo '<input type="text" value="'.$code.'" style="width:150px;" readonly>';
echo "<br><label>URL:</label>";
echo '<input type="text" value="'.$shorturl.'" style="width:150px;" readonly>';
echo "</form>";
echo "<a href='".$shorturl."'>Open ShortURL</a><br>";
?>
<p>Share ShortURL</p>
<!--TWITTER-->
<?php
echo '<a href="https://twitter.com/share" class="twitter-share-button"  data-text="'.$text.'" data-lang="de">Twittern</a>';
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<!--END TWITTER-->
<?php
}
?>

</div>
</td>
</tr>
</table>
</div>

<div class="nav">
<ul class="pull-left">
<li><a href="#info">Get Information about a ShortURL</a></li>
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
<!-- Dieser Text l�uft mittig -->
<a name="info"></a>
<h2>INFO</h2>
<p>Get Information about a <span>ShortURL</span></p>
<form method="GET" action="info.php">
<input class="itext" type="text" name="code" value="CODE" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'CODE';}"/>
<input type="submit" class="ibutton" value="Get INFO" /><br>
<h6><input type="radio" name="art" value="html" checked="checked"> HTML  <input type="radio" name="art" value="json"> JSON</h6>
</form>
</div>
</td>
</tr>
</table>
</div>
</body></html>

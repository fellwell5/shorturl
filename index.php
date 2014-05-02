<html><head><title>Maibaum-Wetter</title>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<style>
      body {
        font-family: 'Montserrat', serif;
        font-size: 72px;
      }
    </style>
<link rel="stylesheet" href="form.css" type="text/css" />
</head>
<?php
error_reporting(0);

###Farben
$colorarr = array("75C600","017D82","D8BF00","B50052");
$randback = rand(0,3);
$randtext = rand(0,3);
$bgcolor = $colorarr[$randback];
$txtcolor = $colorarr[$randtext];
?>
<body bgcolor='<?php echo $bgcolor; ?>' >
<table height="100%" width="100%">
<tr>
<td align="center" valign="middle">
<div>
<!-- Dieser Text läuft mittig -->
<h2>ShortURL</h2><br>
Dieser Link-Generator hilft dir den MBW-Link für deine Stadt zu erstellen:
<form method="POST">
<input class="itext" type="text" name="url" id="Stadt" value="long URL" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'long URL';}"/>
<label>&nbsp;</label><input type="submit" class="ibutton" value="Create ShortURL" />
</form>
<?php
@$url = $_POST["url"];



####CODE
$abc123 = array("q","w","e","r","t","z","u","i","o","p","a","s","d","f","g","h","j","k","l","y","x","c","v","b","n","m",1,2,3,4,5,6,7,8,9,0);
$code = "";
$count = count($abc123);
###WIEVIELE STRINGS?
$strings = 8;
###
for ($i = 1; $i <= $strings; $i++) {
    $rand = rand(0, $count);
    $code .= $abc123[$rand];
}
####END CODE


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
$phrase = "<?php $urla = 'qwe'; ?>";
$alt = array("qwe");
$neu = array("$url");
$inhalt = str_replace($alt, $neu, $phrase);
$datei = fopen($dname, "w");
fwrite($datei, $inhalt);
fclose($datei);


echo "<br>";
echo "ShortURL: ";
echo "<br>";
echo "<form>";
echo '<input type="text" value="'.$shorturl.'" style="width:150px;" readonly>';
echo "</form>";
echo "<a href='".$shorturl."'>Open ShortURL</a><br>";
?>
<br>Share ShortURL<br>
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
</body></html>

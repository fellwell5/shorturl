<?php
error_reporting(0);

$code = $_GET["c"];
$datei = $code.".php";

include $datei;
?>
<html>
<head>
<?php
if($code == ""){
exit("No Code!");
}else{
echo '<meta http-equiv="refresh" content="0; URL='.$url.'">';
}
?>
</head>
</html>
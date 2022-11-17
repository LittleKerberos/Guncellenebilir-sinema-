<?
function logyap($done) {
$countfile = fopen("destkop/logs.txt",a);
fwrite($countfile,"$done<br> \n");
fclose($countfile);
}
?>
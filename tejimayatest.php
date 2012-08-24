<html><body>
<br clear="all" >

<?php 

$url_list = array(
"http://p.pne.jp/d/82/201001121731.png",
"http://p.pne.jp/d/201001121731.png",

"http://p.pne.jp/82/201001121731.png",
"http://p.pne.jp/201001121731.png",

"http://ss.pne.jp/ss/200902281934.png",
"http://ss.pne.jp/200902281934.png",

"http://ss.pne.jp/ss/81/200902281934.png",
"http://ss.pne.jp/81/200902281934.png",

"http://sc.pne.jp/200801081910.png",
"http://sc.pne.jp/81/200801081910.png",
);

foreach($url_list as $url){

echo <<<EOF
$url
<img src="$url"><br>
<br clear="all" >
EOF;

}

?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php phpinfo();?>

</body></html>

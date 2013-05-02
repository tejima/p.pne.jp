<?php
$cachefile =  dirname(__FILE__) . '/tmp/chachefile';
$cachetime = 5 * 60;
// Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
}else{
	$result = "";
  /* The code to dynamically generate the page goes here */
  $fp = fopen("http://update.openpne.jp/graph.php", "r");
  $str = fread($fp,5000);
  //<p id="total">Total: 4661</p> 
  preg_match('/Total:\\s(.*?)</',$str,$matches);

  $result += '{"item":[{"text":"","value":"';
  $result += $matches[1];
  $result += '"},{"text":"","value":"';
  $result += $matches[1];
	$result += '"}]}';

  // Cache the output to a file
  $fp = fopen($cachefile, 'w');
  fwrite($fp, ob_get_contents());
  fclose($fp);
  echo $result;
}
?>

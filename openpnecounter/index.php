<?php
$cachefile =  '/tmp/cachefile';
$cachetime = 5 * 60;
// Serve from the cache if it is younger than $cachetime
if (false && file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
  include($cachefile);
}else{
	$result = "";
  /* The code to dynamically generate the page goes here */
  $fp = fopen("http://update.openpne.jp/graph.php", "r");
  $str = fread($fp,5000);
  //<p id="total">Total: 4661</p> 
  preg_match('/Total:\\s(.*?)</',$str,$matches);
  $total_num = $matches[1];

  //chtt=Daily
  preg_match('/chtt=Weekly(.*?)bvs/s',$str,$matches);
  $line = $matches[1];
  preg_match('/,([0-9]+),([0-9]+)&/s',$line,$matches);
  
  $oneday_num = $matches[1];
  $result .= '{"item":[{"text":"","value":"';
  $result .= $total_num;
  $result .= '"},{"text":"","value":"';
  $result .= $total_num - (int)($oneday_num * 2);
	$result .= '"}]}';

  // Cache the output to a file
  $fp = fopen($cachefile, 'w');
  fwrite($fp, $result);
  fclose($fp);
  echo $result;
}
?>

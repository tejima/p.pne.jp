<?php
$cachefile =  dirname(__FILE__) . '/tmp/chachefile';
$cachetime = 5 * 60;
// Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
}else{
        ob_start(); // Start the output buffer
        /* The code to dynamically generate the page goes here */
        $fp = fopen("http://update.openpne.jp/graph.php", "r");
        $str = fread($fp,5000);

        //<p id="total">Total: 4661</p> 
        preg_match('/Total:\\s(.*?)</',$str,$matches);
        echo $matches[1] ;

        // Cache the output to a file
        $fp = fopen($cachefile, 'w');
        fwrite($fp, ob_get_contents());
        fclose($fp);
        ob_end_flush(); // Send the output to the browser
}
?>

<?php
function pr ($val){
    $bt   = debug_backtrace();
    $file = file($bt[0]['file']);
    $src  = $file[$bt[0]['line']-1];
    $pat = '#(.*)'.__FUNCTION__.' *?\( *?(.*) *?\)(.*)#i';
    $var  = preg_replace ($pat, '$2', $src);
    echo '<script>console.log("'.trim($var).'='.
        addslashes(json_encode($val,JSON_UNESCAPED_UNICODE)) .'")</script>'."\n";
}

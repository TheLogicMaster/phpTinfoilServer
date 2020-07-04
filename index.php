<?php
$gameDir = "Games/";
$ignoreDirs = array('.', '..');
$games = array_diff(scandir($gameDir), $ignoreDirs);
$addr = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$gameDir";
$output = '{"files":[';
foreach ($games as $game) 
  $output = $output. '{"url":"'. "$addr$game". '","size":'. filesize($gameDir. $game). '},';
$output = rtrim($output, ","). '],"directories":[],"success":"Hello Piracy!"}';
echo $output;
?>

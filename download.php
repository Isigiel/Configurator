<?php

    $hash=$_POST["hash"];
    $cfg = json_decode(file_get_contents("/tmp/".$hash.".json"), true);
    unlink($hash.".json");
    $filename = $cfg["name"];
    $file = $cfg["file"];


header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Length: ". strlen($file).";");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/octet-stream; "); 
header("Content-Transfer-Encoding: binary");

echo $file;

?>
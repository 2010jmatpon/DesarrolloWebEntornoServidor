<?php

$zip = new ZipArchive();
if ($zip->open('files.zip') === true){
    $zip->extractTo('files');
    $zip->close();
    echo "descomprimido correctamente";
} else{
    echo "Error";
}
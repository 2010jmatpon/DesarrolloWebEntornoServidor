<?php

$file = 'files.zip';
if(file_exists($file)){
    header('Content description: file transfer');
    header('Content');
}
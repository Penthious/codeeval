<?php

$contents = file_get_contents($argv[1]);

$contentsArray = explode("\n", $contents);

foreach ($contentsArray as $content){
    $returnedArray[] = strtolower($content);
}
echo join("\n", $returnedArray);
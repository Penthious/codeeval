<?php

$contents = file_get_contents($argv[1]);

$contentsArray = explode("\n", $contents);

foreach ($contentsArray as $content){
    $count = 0;
    $content = strtolower($content);
    $contentArray = str_split( $content);
    $returnString = '';
    foreach ($contentArray as $letter) {
        if (ord($letter) >= 97 && ord($letter) <= 122){
            $count += 1;
            if ($count % 2 == 1){
                $upperCaseString = strtoupper($letter);
                $returnString .= $upperCaseString;

            }else{

                $returnString .= $letter;
            }
        }else{
            $returnString .= $letter;
        }
    }
    echo $returnString . PHP_EOL;
}

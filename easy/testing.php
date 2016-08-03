<?php

$contents = file_get_contents($argv[1]);

$contentsArray = explode("\n", $contents);

foreach ($contentsArray as $contents){
    $count = 0;
    $priority;
    $tests = explode(' | ', $contents);
    $testCase = $tests[0];
    $correctCode = $tests[1];
    $testCaseArray = str_split($testCase);
    $correctCodeArray = str_split($correctCode);
    for ($i = 0; $i < count($correctCodeArray); $i++){
        if($testCaseArray[$i] !== $correctCodeArray[$i]){
            $count ++;
        }
    }
    if ($count === 0){
        $cases[] = 'Done';
    }elseif ($count <= 2){
        $cases[] = 'Low';
    }elseif ($count <= 4){
        $cases[] = 'Medium';
    }elseif ($count <= 6){
        $cases[] = 'High';
    }else{
        $cases[] = 'Critical';
    }
}

echo join("\n", $cases);

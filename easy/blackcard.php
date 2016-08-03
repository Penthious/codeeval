<?php

$contents = file_get_contents($argv[1]);

$contentsArray = explode("\n", $contents);

foreach ( $contentsArray as $content ) {
    $explodedContent = explode(' | ', $content);
    $namesString = $explodedContent[0];

    $namesArray = explode(' ', $namesString);

    do {
        $blackCardValue = (int)$explodedContent[1];

        if ( $blackCardValue > count($namesArray) ) {
            while ( $blackCardValue >= count($namesArray) ) {

                if ( count($namesArray) < $blackCardValue ) {
                    $blackCardValue = $blackCardValue - count($namesArray);
                }
                if ( count($namesArray) === $blackCardValue ) {
                    break;
                }
            }
        }
        if ( count($namesArray) === $blackCardValue ) {
            array_splice($namesArray, $blackCardValue - 1, 1);
            if ( count($namesArray) === 1 ) {
                $survivor[] = $namesArray[0];
            }
        } else {
            array_splice($namesArray, $blackCardValue - 1, 1);
            if ( count($namesArray) === 1 ) {
                $survivor[] = $namesArray[0];
            }
        }
    } while ( count($namesArray) !== 1 );
}
$joinedSurvivors = join("\n", $survivor);
echo $joinedSurvivors;

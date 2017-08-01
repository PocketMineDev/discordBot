<?php

function spongemock($content) {
    $str1 = $content;
    $str2 = "";
    $index = 0;
    $upper = true;
    // iterate over whole string
    while (strlen($str2) < strlen($str1)) {
        $nextChar = $str1[$index];
        // if the next char is alpha, make it upper or lower and add it to $str2; otherwise, just add it to $str2
        if (ctype_alpha($nextChar)) {
            if ($upper) {
                $nextChar = strtolower($nextChar);
                $upper = false;
            } else {
                $nextChar = strtoupper($nextChar);
                $upper = true;
            }
            $str2 = $str2 . $nextChar;
            $index++;
        } else {
            $nextChar = $str1[$index];
            $str2 = $str2 . $nextChar;
            $index++;
        }
    }
    return $str2;
}
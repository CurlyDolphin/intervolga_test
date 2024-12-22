<?php

function cut_text($html, $maxWords) {
    $matches = [];
    preg_match_all('/<[^>]+>|[^<>\s]+/', $html, $matches);
    $elements = $matches[0]; 

    $result = [];
    $openTags = []; 
    $wordCount = 0;

    foreach ($elements as $element) {
        if (preg_match('/<([a-z]+)[^>]*>/i', $element, $tagMatch)) {
            $openTags[] = $tagMatch[1];
            array_push($result, $element); 
        } elseif (preg_match('/<\/([a-z]+)>/i', $element, $tagMatch)) {
            $tagName = $tagMatch[1];
            $key = array_search($tagName, $openTags);
            if ($key !== false) {
                unset($openTags[$key]);
            }
            $result[] = $element; 
        } else {
            $result[] = $element;
            $wordCount++;
            if ($wordCount >= $maxWords) {
                break; 
            }
        }
    }

    if ($wordCount == $maxWords) {
        $result[] = "...";
    }

    if (count($openTags) > 0) {
        foreach (array_reverse($openTags) as $tag) {
            $result[] = "</$tag>";
        }
    }

    return implode(' ', $result); 
}

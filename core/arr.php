<?php

function filterArrayByKeys($target, $keys){
    $result = [];
    foreach($keys as $key){
        if (array_key_exists($key, $target)) {
            $result[$key] = $target[$key];
        } else {
            $result[$key] = '';
        }
    }
    return $result;
}
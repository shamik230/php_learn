<?php

function filter_array_by_keys($target, $keys){
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
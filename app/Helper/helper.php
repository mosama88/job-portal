<?php

if (!function_exists('getFirstLetter')) {
    function getFirstLetter($name)
    {
        return mb_substr($name, 0, 1);
    }
}
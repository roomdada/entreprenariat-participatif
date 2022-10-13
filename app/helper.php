<?php

if (! function_exists('get_page_title')) {
    function get_page_title($title)
    {
        return $title.' | '.config('app.name');
    }
}

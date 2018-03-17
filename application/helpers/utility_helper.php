<?php

function asset_url(){
    return base_url().'assets/';
}

function dumpData($data, $die = false) {
    echo '<pre>';
    print_r($data);
    echo '</pre><hr />';

    if ($die) {
        die();
    }
}

function getTheRaceSlug($uri_array) {

    return end($uri_array);

}
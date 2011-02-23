#!/usr/bin/php
<?php

if ( ! $argv[1] or ! preg_match('|vimeo\.com/(\d+)$|', $argv[1], $matches) ) {
    print "Usage: $argv[0] <vimeo_url>\n";
    exit(1);
}

if ( count($matches) > 0 ) {
    $vimeo_id = $matches[1];

    $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vimeo_id.php"));

    $sizes = array('small', 'medium', 'large');
    foreach ($sizes as $size) {
        print "$size: " . $hash[0]["thumbnail_$size"] . "\n";
    }
}
?>

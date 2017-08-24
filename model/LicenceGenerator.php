<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 22/08/2017
 * Time: 13:44
 */

class LicenceGenerator
{
public static function generate_key_string() {

    $tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $segment_chars = 4;
    $num_segments = 4;
    $key_string = '';

    for ($i = 0; $i < $num_segments; $i++) {

        $segment = '';

        for ($j = 0; $j < $segment_chars; $j++) {
                $segment .= $tokens[rand(0, 35)];
        }

$key_string .= $segment;

}

return $key_string;

}
}
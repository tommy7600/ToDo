<?php defined('SYSPATH') or die('No direct script access.');

class HTMLHelper
{
    public static function Alert($type, array $array, $key)
    {
        if (isset($array['_external'][$key])) {
            return '<div class="alert alert-' . $type . '">' . $array['_external'][$key] . '</div>';
        }

        if (isset($array[$key])) {
            return '<div class="alert alert-' . $type . '">' . $array[$key] . '</div>';
        }
    }
}

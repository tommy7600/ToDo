<?php defined('SYSPATH') OR die('No direct script access.');

class HTML extends Kohana_HTML
{
    public static function errorLabel(array $errors, $key)
    {
        if(isset($errors[$key]))
            return '<div class="control-group error"><label class="control-label" for="'.$key.'">'.$errors[$key].'</label></div>';
        if(isset($errors["_external"][$key]))
            return '<div class="control-group error"><label class="control-label" for="'.$key.'">'.$errors["_external"][$key].'</label></div>';
        return '';
    }
}
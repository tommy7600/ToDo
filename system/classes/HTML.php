<?php defined('SYSPATH') OR die('No direct script access.');

class HTML extends Kohana_HTML
{
    public static function errorLabel(array $errors, $key)
    {
        if(isset($errors[$key]))
            return '<span class="label label-important">'.$errors[$key].'</span>';
        if(isset($errors["_external"][$key]))
            return '<span class="label label-important">'.$errors["_external"][$key].'</span>';
        return '';
    }

    public static function alerts(array $messages)
    {
        $divLabels="";
        if (isset($messages["success"]) && !empty($messages["success"]))
        {
            foreach ($messages["success"] as $key => $val) {
                $divLabels .= "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                              <strong>" . $key . " Success!</strong> " . $val . "
                            </div>";
            }
        }
        if (isset($messages["error"]) && !empty($messages["error"]))
        {
            foreach ($messages["error"] as $key => $val) {
                $divLabels .= "<div class='alert alert-error'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                              <strong>" . $key . " Error!</strong> " . $val . "
                            </div>";
            }
        }
        return $divLabels;
    }
}
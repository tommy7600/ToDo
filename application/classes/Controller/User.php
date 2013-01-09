<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Layout
{
    public function before()
    {
        parent::before();
        if (!Auth::instance()->logged_in()) {
            HTTP::redirect("account");
        }
        if (Auth::instance()->logged_in("admin")) {
            HTTP::redirect("admin");
        }
    }

    public function action_index()
    {

    }

    public function action_logout()
    {
        Auth::instance()->logout();
        HTTP::redirect();
    }
}

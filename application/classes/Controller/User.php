<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kbadura
 * Date: 1/8/13
 * Time: 9:46 AM
 * To change this template use File | Settings | File Templates.
 */
class Controller_User extends Controller_Layout
{
    public function before()
    {
        parent::before();
        if(!Auth::instance()->logged_in())
        {
            HTTP::redirect("account");
        }
        if(Auth::instance()->logged_in("admin"))
        {
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

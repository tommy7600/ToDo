<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kbadura
 * Date: 1/7/13
 * Time: 2:18 PM
 * To change this template use File | Settings | File Templates.
 */
class Controller_Admin extends Controller_Layout
{


    public function __construct(Request $request, Response $response)
    {
        $this->navbar="layout/navbar-admin";
        $this->title="Admin";

        parent::__construct($request,$response);
    }

    public function before()
    {
        parent::before();

        if(!Auth::instance()->logged_in("admin"))
        {
            HTTP::redirect("account");
        }
    }

    public function action_index()
    {

    }
}

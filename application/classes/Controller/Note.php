<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by JetBrains PhpStorm.
 * User: kbadura
 * Date: 1/7/13
 * Time: 11:26 AM
 * To change this template use File | Settings | File Templates.
 */
class Controller_Note extends Controller_Layout
{
    public function __construct(Request $request, Response $response)
    {
        $this->title = "ToDo - Note";

        parent::__construct($request,$response);
    }

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
}

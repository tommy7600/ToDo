<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Account extends Controller_Layout
{
    public function __construct(Request $request, Response $response)
    {
        $this->template="layout/account";
        $this->title = "ToDo";

        parent::__construct($request,$response);
    }

	public function action_index()
	{
        if(Auth::instance()->logged_in())
        {
            if(Auth::instance()->logged_in("admin"))
            {
                HTTP::redirect("admin");
            }
            HTTP::redirect("note");
        }

        $post = $this->request->post();
        if(isset($post["username"], $post["password"]))
        {
            if (Auth::instance()->login($post['username'], $post['password']))
            {
                HTTP::redirect('admin');
            }
            else
            {
                $this->template->error = __('Podane dane są nieprawidłowe.');
            }
        }
	}

    public function action_logout()
    {
        Auth::instance()->logout();
        HTTP::redirect();
    }

    public function action_registration()
    {
        $post = $this->request->post();
        if(isset($post["username"], $post["password"]))
        {
        }
    }

    public function action_forgottenPassword()
    {

    }

} // End Welcome

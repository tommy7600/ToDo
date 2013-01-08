<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Account extends Controller_Layout
{
    public function __construct(Request $request, Response $response)
    {
        $this->template="layout/account";
        $this->title = "ToDo";

        parent::__construct($request,$response);
    }

    public function before()
    {
        parent::before();

        if(Auth::instance()->logged_in())
        {
            if(Auth::instance()->logged_in("admin"))
            {
                HTTP::redirect("admin");
            }
            HTTP::redirect("note");
        }
    }

	public function action_index()
	{
        $post = $this->request->post();
        if(isset($post["username"], $post["password"]))
        {
            if (Auth::instance()->login($post['username'], $post['password']))
            {
                HTTP::redirect("");
            }
            else
            {
                $this->template->error = __('Podane dane są nieprawidłowe.');
            }
        }
	}

    public function action_registration()
    {
        $this->_save(ORM::factory("user"));
    }

    public function action_forgottenPassword()
    {

    }

    public function action_resetPassword()
    {

    }

    private function _save($user)
    {
        $post = $this->request->post();

        if(isset($post["username"]))
        {
            try
            {
                $extraValid = Validation::factory($post);

                $user->username = $post["username"];
                $extraValid->rule('username', "not_empty");

                $user->email = $post["email"];
                $extraValid->rule('email', "not_empty");
                $extraValid->rule('email', "email");

                if (isset($post["password"]) && !empty($post["password"]))
                {
                    $user->password = $post["password"];
                    $extraValid->rule("password", "min_length", array(':value','6'));
                }

                $user->save($extraValid);

                $user->remove("roles");
                $user->add("roles", 1);

                HTTP::redirect();
            }
            catch (ORM_Validation_Exception $e)
            {
                $this->template->errors =  $e->errors('');
            }
        }
    }
} // End Welcome

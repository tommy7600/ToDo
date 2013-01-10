<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Layout
{
    public $navbar = "layout/navbar";
    public $template = "layout/index-admin";
    protected $title = "Admin";

    public function before()
    {
        parent::before();
        if (!Auth::instance()->logged_in()) {
            HTTP::redirect("account");
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

    public function action_profile()
    {
        $item = Auth::instance()->get_user();

        // TODO Change it!!!!!!
        $post = $this->request->post();

        if (isset($post["email"])) {
            try {
                $item->email = $post["email"];

                if (isset($post["password"]) && !empty($post["password"])) {
                    $item->password = $post["password"];
                }
                $item->save();

                //todo: check if admin
                HTTP::redirect("user_admin");
            } catch (ORM_Validation_Exception $e) {
                var_dump($e->errors());
            }
        }

        $this->template->user = $item;
    }
}

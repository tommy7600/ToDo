<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Layout
{
    public $navbar = "layout/navbar";
    public $template = "layout/index";
    protected $title = "User";

    public function before()
    {
        parent::before();
        if (!Auth::instance()->logged_in()) {
            HTTP::redirect("account");
        }
    }

    public function __construct($request, $response)
    {
        if (Auth::instance()->logged_in("admin")) {
            $this->navbar = "layout/navbar-admin";
            $this->template = "layout/index-admin";
            $this->title = "Admin";
        }
        parent::__construct($request, $response);
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

        $post = $this->request->post();

        if (isset($post["email"])) {
            try {
                $item->email = $post["email"];

                if (isset($post["password"]) && !empty($post["password"])) {
                    $item->password = $post["password"];
                }
                $item->save();

                if (Auth::instance()->logged_in("admin")) {
                    HTTP::redirect("user_admin");
                } else {
                    HTTP::redirect("note");
                }
            } catch (ORM_Validation_Exception $e) {
                //todo
                var_dump($e->errors());
            }
        }

        $this->template->user = $item;
    }
}

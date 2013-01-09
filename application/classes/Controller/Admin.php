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
        $this->navbar = "layout/navbar-admin";
        $this->title = "Admin";

        parent::__construct($request, $response);
    }

    public function before()
    {
        parent::before();

        if (!Auth::instance()->logged_in("admin")) {
            HTTP::redirect("account");
        }
    }

    public function action_index()
    {
        $this->template->users = ORM::factory("user")->find_all();
    }

    public function action_add()
    {
        $this->template->roles = ORM::factory("role")->find_all();
        $this->_save(ORM::factory("user"));
    }

    public function action_edit()
    {
        $this->template->roles = ORM::factory("role")->find_all();
        $this->_save(ORM::factory("user", (int)$this->request->param("id", 0)));
    }

    public function action_delete()
    {

    }

    private function _save($item)
    {
        $this->template->userRole = $item->roles->find_all()->as_array(NULL, "id");
        $post = $this->request->post();

        if (isset($post["username"])) {
            try {
                $item->username = $post["username"];
                $item->email = $post["email"];
                if (isset($post["password"]) && !empty($post["password"])) {
                    $item->password = $post["password"];
                }
                $item->save();

                $item->remove("roles");
                $item->add("roles", $post["role"]);

                HTTP::redirect("admin");
            } catch (ORM_Validation_Exception $e) {
                var_dump($e->errors());
            }
        }

        $this->template->user = $item;
    }

    public function action_logout()
    {
        Auth::instance()->logout();
        HTTP::redirect();
    }
}

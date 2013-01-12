<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Admin extends Controller_User
{
    public $navbar = "layout/navbar-admin";
    public $template = "layout/index-admin";
    protected $title = "Admin";

    public function before()
    {
        parent::before();

        if (!Auth::instance()->logged_in("admin")) {
            HTTP::redirect("account");
        }
    }

    public function action_index()
    {

    }

    public function action_userslist()
    {
        $this->template->users = ORM::factory("user")->find_all();
    }

    public function action_find()
    {
        $keyword = htmlspecialchars(trim($this->request->query("keyword")));
        if (isset($keyword) && !empty($keyword))
            $this->template->users = ORM::factory("user")->or_where('username', "LIKE", "%" . $keyword . "%")->or_where("email", "LIKE", "%" . $keyword . "%")->find_all();
        else
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
        $user = ORM::factory('user')
            ->where('id', '=', $this->request->param('id'))
            ->find()
            ->delete();

        HTTP::redirect('user_admin/userslist');
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

                HTTP::redirect("user_admin/userslist");
            } catch (ORM_Validation_Exception $e) {
                var_dump($e->errors());
            }
        }

        $this->template->user = $item;
    }
}

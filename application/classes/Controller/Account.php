<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Account extends Controller_Layout
{

    public $template = "layout/account";
    public $title = "ToDo";

    public function before()
    {
        parent::before();

        if (Auth::instance()->logged_in()) {
            if (Auth::instance()->logged_in("admin")) {
                HTTP::redirect("admin");
            }
            HTTP::redirect("note");
        }
    }

    public function action_index()
    {
        $post = $this->request->post();
        if (isset($post["username"], $post["password"])) {
            if (Auth::instance()->login($post['username'], $post['password'])) {
                HTTP::redirect();
            } else {
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
        $post = $this->request->post();
        if (isset($post["email"])) {
            $user = ORM::factory("user")->where("email", "LIKE", $post["email"])->find();
            if (isset($user) && $user !== NULL) {
                $mailer = Kohana_Sender::connect();

                $token = ORM::factory('user_token');
                // Set token data
                $token->user_id = $user->id;
                $token->expires = time() + 100000;
                $token->save();

                $message = Swift_Message::newInstance()
                    ->setSubject('Forgotten Password ToDo')
                    ->setFrom(array('kamilsmtptest@gmail.com' => 'ToDo'))
                    ->setTo(array($user->email => $user->username))
                    //todo: add dynamic content to mailBody
                    ->setBody('ResetPassword http://todo.localhost/account/resetpassword/' . $token->token, 'text/html');

                $mailer->send($message);

                //TODO: add message to site
            }
        }
    }

    public function action_resetPassword()
    {
        $tokenId = $this->request->param("id");
        $token = Model_User_Token::factory('user_token')->where("token", "=", $tokenId)->find();
        if ($token->loaded()) {
            if ($this->_changePassword(ORM::factory("user", $token->user_id))) {
                $token->delete();
            }
            ;
        }
    }

    public function _changePassword($user)
    {
        $post = $this->request->post();
        if (isset($post["password"]) && !empty($post["password"])) {
            $extraValid = Validation::factory($post);
            $user->password = $post["password"];
            $extraValid->rule("password", "min_length", array(':value', '6'));
            $user->save($extraValid);
            return TRUE;
        }
        return FALSE;
    }

    /**
     * @param $user user Auth Entity
     */
    private function _save($user)
    {
        $post = $this->request->post();

        if (isset($post["username"])) {
            try {
                $extraValid = Validation::factory($post);

                if (isset($post["username"])) {
                    $user->username = $post["username"];
                    $extraValid->rule('username', "not_empty");
                }

                if (isset($post["email"])) {
                    $user->email = $post["email"];
                    $extraValid->rule('email', "not_empty");
                    $extraValid->rule('email', "email");
                }

                if (isset($post["password"]) && !empty($post["password"])) {
                    $user->password = $post["password"];
                    $extraValid->rule("password", "min_length", array(':value', '6'));
                }

                $user->save($extraValid);

                $user->remove("roles");
                if (isset($post["role"]))
                    $user->add("roles", $post["role"]);
                else
                    $user->add("roles", 1);

                HTTP::redirect();
            } catch (ORM_Validation_Exception $e) {
                $this->template->errors = $e->errors('');
            }
        }
    }
}
